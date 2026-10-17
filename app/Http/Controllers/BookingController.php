<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Models\Booking;
use App\Support\Pricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function create(Request $request, string $locale, ?string $tent = null)
    {
        $tents = collect(config('le8.tents'));

        $selected = $tent
            ? $tents->firstWhere('slug', $tent)
            : $tents->first();

        abort_if($selected === null, 404);

        return view('reservation.create', [
            'tents' => $tents,
            'selected' => $selected,
            'checkIn' => $request->query('check_in'),
            'checkOut' => $request->query('check_out'),
            'guests' => $request->query('guests', 1),
        ]);
    }

    public function store(Request $request, string $locale): RedirectResponse
    {
        $tents = collect(config('le8.tents'));
        $slugs = $tents->pluck('slug')->all();

        $validated = $request->validate([
            'tent' => ['required', 'string', 'in:'.implode(',', $slugs)],
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1', 'max:10'],
            'guest_name' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email', 'max:255'],
            'guest_phone' => ['required', 'string', 'max:50'],
        ]);

        $tentData = $tents->firstWhere('slug', $validated['tent']);

        if ($validated['guests'] > $tentData['capacity_max']) {
            return back()
                ->withInput()
                ->withErrors(['guests' => __('Cette tente accueille au maximum :max personnes.', ['max' => $tentData['capacity_max']])]);
        }

        $nights = Pricing::nights($validated['check_in'], $validated['check_out']);
        $breakdown = Pricing::breakdown($tentData['price_per_night_xof'], $nights);

        $booking = Booking::create([
            'reference' => 'LE8-'.strtoupper(Str::random(8)),
            'locale' => $locale,
            'tent_slug' => $tentData['slug'],
            'tent_name' => $tentData['name'],
            'price_per_night_xof' => $tentData['price_per_night_xof'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'nights' => $nights,
            'guests' => $validated['guests'],
            'total_xof' => $breakdown['total_xof'],
            'deposit_percent' => $breakdown['deposit_percent'],
            'deposit_xof' => $breakdown['deposit_xof'],
            'balance_xof' => $breakdown['balance_xof'],
            'guest_name' => $validated['guest_name'],
            'guest_email' => $validated['guest_email'],
            'guest_phone' => $validated['guest_phone'],
            'status' => 'pending_deposit',
        ]);

        try {
            Mail::to($booking->guest_email)->send(new BookingConfirmation($booking));
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('reservation.confirmation', [
            'locale' => $locale,
            'reference' => $booking->reference,
        ]);
    }

    public function confirmation(string $locale, string $reference)
    {
        $booking = Booking::where('reference', $reference)->firstOrFail();

        return view('reservation.confirmation', [
            'booking' => $booking,
        ]);
    }
}
