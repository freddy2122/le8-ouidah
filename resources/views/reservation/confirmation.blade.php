@extends('layouts.app')

@section('title', __('Demande envoyée').' — Le 8')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <div class="text-center mb-10">
        <p class="inline-block bg-sable text-rouge text-sm font-semibold px-4 py-1.5 rounded-full mb-4">
            {{ __('Réf. :reference', ['reference' => $booking->reference]) }}
        </p>
        <h1 class="font-display text-3xl sm:text-4xl font-semibold">{{ __('Votre demande de réservation est enregistrée') }}</h1>
        <p class="text-encre/70 mt-3">
            {{ __('Un récapitulatif a été envoyé à :email. Notre équipe vous recontacte sous 24h par WhatsApp ou email pour confirmer la disponibilité et les instructions de paiement de l\'acompte.', ['email' => $booking->guest_email]) }}
        </p>
    </div>

    <div class="rounded-2xl border border-encre/10 p-6 sm:p-8 space-y-6">
        <div class="grid sm:grid-cols-2 gap-6 text-sm">
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Tente') }}</dt><dd class="font-medium">{{ $booking->tent_name }}</dd></div>
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Voyageurs') }}</dt><dd class="font-medium">{{ $booking->guests }} {{ __('personne(s)') }}</dd></div>
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Arrivée') }}</dt><dd class="font-medium">{{ $booking->check_in->translatedFormat('d F Y') }}</dd></div>
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Départ') }}</dt><dd class="font-medium">{{ $booking->check_out->translatedFormat('d F Y') }}</dd></div>
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Nuits') }}</dt><dd class="font-medium">{{ $booking->nights }}</dd></div>
            <div><dt class="text-encre/50 text-xs uppercase">{{ __('Statut') }}</dt><dd class="font-medium">{{ __('En attente du paiement de l\'acompte') }}</dd></div>
        </div>

        <div class="border-t border-encre/10 pt-6 space-y-2 text-sm">
            <div class="flex justify-between"><span>{{ __('Total du séjour') }}</span><span class="font-semibold">{{ \App\Support\Pricing::formatXof($booking->total_xof) }}</span></div>
            <div class="flex justify-between text-rouge"><span>{{ __('Acompte (:percent%) à régler pour confirmer', ['percent' => $booking->deposit_percent]) }}</span><span class="font-semibold">{{ \App\Support\Pricing::formatXof($booking->deposit_xof) }}</span></div>
            <div class="flex justify-between text-encre/60"><span>{{ __('Solde à régler sur place') }}</span><span>{{ \App\Support\Pricing::formatXof($booking->balance_xof) }}</span></div>
        </div>

        <div class="border-t border-encre/10 pt-6">
            <p class="font-semibold mb-2">{{ __('Politique d\'annulation') }}</p>
            <p class="text-sm text-encre/80">{{ __('L\'acompte de :percent% n\'est pas remboursable en cas d\'annulation.', ['percent' => $booking->deposit_percent]) }}</p>
        </div>

        <div class="border-t border-encre/10 pt-6">
            <p class="font-semibold mb-2">{{ __('Et maintenant ?') }}</p>
            <ol class="list-decimal pl-5 text-sm text-encre/80 space-y-1">
                <li>{{ __('Notre équipe vous contacte sur WhatsApp ou par email avec les instructions de paiement de l\'acompte.') }}</li>
                <li>{{ __('Votre réservation est confirmée dès réception de l\'acompte.') }}</li>
                <li>{{ __('Le solde se règle sur place, à votre arrivée.') }}</li>
            </ol>
        </div>

        <div class="border-t border-encre/10 pt-6 grid sm:grid-cols-2 gap-6 text-sm">
            <div>
                <p class="font-semibold mb-1">{{ __('Localisation') }}</p>
                <p class="text-encre/80">{{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }}</p>
            </div>
            <div>
                <p class="font-semibold mb-1">{{ __('Contact') }}</p>
                <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="text-rouge hover:text-rouge-dark">WhatsApp {{ config('le8.company.whatsapp') }}</a>
            </div>
        </div>
    </div>

    <p class="text-center text-sm text-encre/60 mt-8">
        {{ __('Pensez à consulter notre page') }}
        <a href="{{ route('pages.prepare-stay', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge">{{ __('Préparer mon séjour') }}</a>
        {{ __('pour organiser votre arrivée.') }}
    </p>
</section>
@endsection
