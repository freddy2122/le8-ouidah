@extends('layouts.app')

@section('title', __('Réserver').' — Le 8')

@php
    $tentsForJs = $tents->map(fn ($t) => [
        'slug' => $t['slug'],
        'name' => $t['name'],
        'price' => $t['price_per_night_xof'],
        'capacityMax' => $t['capacity_max'],
    ])->values();
@endphp

@section('content')
<section class="max-w-5xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-3">{{ __('Réserver') }}</h1>
    <p class="text-encre/70 mb-10">{{ __('Le prix total, l\'acompte et le solde s\'affichent avant toute validation.') }}</p>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-rouge/10 border border-rouge/30 text-rouge-dark text-sm px-4 py-3">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('reservation.store', ['locale' => app()->getLocale()]) }}" class="grid lg:grid-cols-3 gap-10" id="booking-form">
        @csrf

        <div class="lg:col-span-2 space-y-6">
            <div>
                <label class="block text-sm font-medium mb-2">{{ __('Tente') }}</label>
                <select name="tent" id="tent-select" class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                    @foreach ($tents as $t)
                        <option value="{{ $t['slug'] }}" {{ old('tent', $selected['slug']) === $t['slug'] ? 'selected' : '' }}>
                            {{ $t['name'] }} — {{ \App\Support\Pricing::formatXof($t['price_per_night_xof']) }} / {{ __('nuit') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">{{ __('Arrivée') }}</label>
                    <input type="date" name="check_in" id="check-in" value="{{ old('check_in', $checkIn) }}" required
                           class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">{{ __('Départ') }}</label>
                    <input type="date" name="check_out" id="check-out" value="{{ old('check_out', $checkOut) }}" required
                           class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">{{ __('Nombre de personnes') }}</label>
                <input type="number" name="guests" id="guests-input" min="1" max="10" value="{{ old('guests', $guests) }}" required
                       class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">{{ __('Nom complet') }}</label>
                    <input type="text" name="guest_name" value="{{ old('guest_name') }}" required
                           class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">{{ __('Téléphone (avec indicatif)') }}</label>
                    <input type="tel" name="guest_phone" value="{{ old('guest_phone') }}" required
                           class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">{{ __('Email') }}</label>
                <input type="email" name="guest_email" value="{{ old('guest_email') }}" required
                       class="w-full rounded-lg border border-encre/20 px-4 py-3 text-sm">
                <p class="text-xs text-encre/50 mt-1">{{ __('La confirmation de réservation vous sera envoyée à cette adresse.') }}</p>
            </div>
        </div>

        {{-- Récapitulatif prix --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28 rounded-2xl border border-encre/10 p-6">
                <p class="font-semibold mb-4">{{ __('Récapitulatif') }}</p>

                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-encre/60" id="summary-tent-label">—</dt>
                        <dd id="summary-price-per-night">—</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-encre/60">{{ __('Nuits') }}</dt>
                        <dd id="summary-nights">—</dd>
                    </div>
                    <div class="border-t border-encre/10 pt-2 flex justify-between font-semibold">
                        <dt>{{ __('Total') }}</dt>
                        <dd id="summary-total">—</dd>
                    </div>
                    <div class="flex justify-between text-rouge font-semibold">
                        <dt>{{ __('Acompte à payer maintenant (:percent%)', ['percent' => config('le8.cancellation_policy.deposit_percent')]) }}</dt>
                        <dd id="summary-deposit">—</dd>
                    </div>
                    <div class="flex justify-between text-encre/60">
                        <dt>{{ __('Solde à régler sur place') }}</dt>
                        <dd id="summary-balance">—</dd>
                    </div>
                </dl>

                <div class="mt-5 rounded-lg bg-sable p-4 text-xs text-encre/80 leading-relaxed">
                    {{ __('L\'acompte de :percent% n\'est pas remboursable en cas d\'annulation. En confirmant, vous acceptez nos', ['percent' => config('le8.cancellation_policy.deposit_percent')]) }}
                    <a href="{{ route('pages.terms', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge" target="_blank">{{ __('conditions générales de vente') }}</a>.
                </div>

                <button type="submit" class="mt-5 w-full rounded-full bg-rouge px-6 py-3.5 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                    {{ __('Envoyer ma demande de réservation') }}
                </button>
                <p class="text-xs text-encre/50 mt-3">
                    {{ __('Cette demande crée une pré-réservation. Notre équipe vous enverra les instructions de paiement de l\'acompte par WhatsApp/email pour confirmer définitivement votre place.') }}
                </p>
            </div>
        </aside>
    </form>
</section>

@push('scripts')
<script>
    (function () {
        var tents = @json($tentsForJs);
        var depositPercent = {{ (int) config('le8.cancellation_policy.deposit_percent') }};
        var eurRate = {{ (float) config('le8.currency.eur_rate_fixed') }};

        var tentSelect = document.getElementById('tent-select');
        var checkIn = document.getElementById('check-in');
        var checkOut = document.getElementById('check-out');
        var guestsInput = document.getElementById('guests-input');

        function formatXof(amount) {
            return new Intl.NumberFormat('fr-FR').format(Math.round(amount)) + ' FCFA';
        }
        function formatEur(amount) {
            return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(amount) + ' €';
        }

        function nightsBetween(a, b) {
            var d1 = new Date(a);
            var d2 = new Date(b);
            if (isNaN(d1) || isNaN(d2)) return 0;
            var diff = Math.round((d2 - d1) / 86400000);
            return diff > 0 ? diff : 0;
        }

        function recalc() {
            var tent = tents.find(function (t) { return t.slug === tentSelect.value; }) || tents[0];
            var nights = nightsBetween(checkIn.value, checkOut.value);
            var total = tent.price * nights;
            var deposit = Math.round(total * depositPercent / 100);
            var balance = total - deposit;

            document.getElementById('summary-tent-label').textContent = tent.name;
            document.getElementById('summary-price-per-night').textContent = formatXof(tent.price) + ' / ' + '{{ __('nuit') }}';
            document.getElementById('summary-nights').textContent = nights;
            document.getElementById('summary-total').textContent = nights ? (formatXof(total) + ' (≈ ' + formatEur(total / eurRate) + ')') : '—';
            document.getElementById('summary-deposit').textContent = nights ? formatXof(deposit) : '—';
            document.getElementById('summary-balance').textContent = nights ? formatXof(balance) : '—';

            guestsInput.max = tent.capacityMax;
        }

        [tentSelect, checkIn, checkOut, guestsInput].forEach(function (el) {
            el.addEventListener('input', recalc);
            el.addEventListener('change', recalc);
        });

        recalc();
    })();
</script>
@endpush
@endsection
