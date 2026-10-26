@extends('layouts.app')

@section('title', 'Le 8 — Hébergement en tentes à Ouidah, Bénin')

@section('content')

    {{-- HERO --}}
    <section class="relative">
        <div class="h-[88vh] min-h-[620px] flex items-end relative overflow-hidden">
            <img src="{{ asset('images/hero-porte-du-non-retour.jpg') }}"
                 alt="{{ __('La Porte du Non-Retour, mémorial de la Route des Esclaves à Ouidah') }}"
                 class="absolute inset-0 w-full h-full object-cover hero-kenburns">
            <div class="absolute inset-0 bg-gradient-to-t from-encre/95 via-encre/50 to-encre/10"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 pb-16 w-full">
                <p class="inline-block bg-white/90 text-encre text-xs sm:text-sm font-medium px-3 py-1 rounded-full mb-4">
                    {{ __('Ouidah, Bénin — berceau du vodun') }}
                </p>
                <h1 class="font-display text-4xl sm:text-6xl lg:text-7xl font-semibold text-white drop-shadow-sm max-w-3xl">
                    {{ __('Dormir sous tente, au cœur de la culture et du tourisme béninois') }}
                </h1>
                <p class="mt-5 text-white/90 max-w-2xl text-base sm:text-xl">
                    {{ __("Temples vodun, art, mémoire de la Route des Esclaves, plages de l'Atlantique : Ouidah est l'un des hauts lieux culturels et touristiques du Bénin. Le 8 vous y accueille à deux pas des Vodun Days, avec des tarifs clairs et aucune surprise au paiement.") }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('tentes.index', ['locale' => app()->getLocale()]) }}" class="rounded-full bg-rouge px-6 py-3 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                        {{ __('Voir les tentes') }}
                    </a>
                    <a href="{{ route('pages.prepare-stay', ['locale' => app()->getLocale()]) }}" class="rounded-full bg-white/90 px-6 py-3 text-sm font-semibold text-encre hover:bg-white transition">
                        {{ __('Préparer mon séjour') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- NON-AFFILIATION --}}
    <section class="bg-sable border-y border-encre/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 text-sm text-encre/80 flex flex-wrap items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rouge shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>
                <strong>{{ __('Le 8 est un hébergement indépendant.') }}</strong>
                {{ __("Nous ne sommes affiliés à aucune organisation, institution ou événement officiel — notamment pas à l'organisation des Vodun Days.") }}
            </p>
        </div>
    </section>

    {{-- INTRO / BIENVENUE --}}
    <section class="max-w-4xl mx-auto px-4 sm:px-6 py-20 text-center">
        <h2 class="font-display text-3xl sm:text-4xl font-semibold mb-6">{{ __('Bienvenue au 8') }}</h2>
        <p class="text-encre/80 leading-relaxed text-lg">
            {{ __("Un lieu où l'hospitalité et l'évasion se rencontrent. Nous mettons notre connaissance du terrain, notre sens de l'accueil et notre exigence de transparence au service de votre séjour à Ouidah — que vous veniez pour les Vodun Days ou à tout autre moment de l'année. Chaque réservation est pensée pour que vous sachiez exactement ce que vous achetez, avant de payer quoi que ce soit.") }}
        </p>
    </section>

    {{-- TENTES --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
        <div class="flex items-end justify-between flex-wrap gap-4 mb-10">
            <div>
                <h2 class="font-display text-3xl font-semibold">{{ __('Nos tentes') }}</h2>
                <p class="text-encre/70 mt-2">{{ __('Capacité, équipements, sanitaires : tout est détaillé avant réservation.') }}</p>
            </div>
            <a href="{{ route('tentes.index', ['locale' => app()->getLocale()]) }}" class="text-sm font-semibold text-rouge hover:text-rouge-dark">{{ __('Voir toutes les tentes →') }}</a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tents as $tent)
                <a href="{{ route('tentes.show', ['locale' => app()->getLocale(), 'tent' => $tent['slug']]) }}" class="group block rounded-2xl overflow-hidden border border-encre/10 hover:shadow-lg transition">
                    <div class="photo-placeholder h-48"></div>
                    <div class="p-6">
                        <h3 class="font-display text-xl font-semibold group-hover:text-rouge transition">{{ $tent['name'] }}</h3>
                        <p class="text-sm text-encre/70 mt-1">{{ $tent['tagline'] }}</p>
                        <div class="mt-4 flex items-center justify-between text-sm">
                            <span class="text-encre/60">{{ $tent['capacity_min'] }}–{{ $tent['capacity_max'] }} {{ __('personnes') }}</span>
                            <span class="font-semibold text-rouge">{{ \App\Support\Pricing::formatXof($tent['price_per_night_xof']) }} / {{ __('nuit') }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- RESTAURATION --}}
    <section class="bg-sable">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 grid lg:grid-cols-2 gap-12 items-center">
            <div class="photo-placeholder h-64 lg:h-80 rounded-2xl"></div>
            <div>
                <h2 class="font-display text-3xl font-semibold mb-4">{{ __('Restauration & expériences culinaires') }}</h2>
                <p class="text-encre/80 leading-relaxed mb-6">
                    {{ __('Au-delà de l\'hébergement, Le 8 propose un espace de restauration sur place ainsi que des expériences culinaires locales — dîners typiques et découverte de la cuisine béninoise — pour prolonger le voyage dans l\'assiette.') }}
                </p>
                <ul class="space-y-3 text-sm text-encre/80 mb-6">
                    <li class="flex gap-3">
                        <span class="text-rouge font-semibold">—</span>
                        <span>{{ __('Restaurant / espace repas sur place, facturé séparément de la nuitée.') }}</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-rouge font-semibold">—</span>
                        <span>{{ __('Expériences culinaires locales sur demande (dîners typiques, découverte de la cuisine béninoise).') }}</span>
                    </li>
                </ul>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('pages.dining', ['locale' => app()->getLocale()]) }}" class="inline-flex items-center rounded-full bg-rouge px-6 py-3 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                        {{ __('Voir la carte et les tarifs') }}
                    </a>
                    <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full border border-encre/20 px-6 py-3 text-sm font-semibold hover:border-encre/40 transition">
                        {{ __('Réserver sur WhatsApp') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- TRANSPARENCE --}}
    <section class="bg-encre text-sable">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 grid md:grid-cols-3 gap-10">
            <div>
                <p class="font-display text-2xl text-white font-semibold mb-2">{{ __('Prix 100% transparents') }}</p>
                <p class="text-sable/80 text-sm leading-relaxed">{{ __('Nuitée × nombre de nuits = total. Acompte de 50% affiché avant paiement, sans frais caché de dernière minute.') }}</p>
            </div>
            <div>
                <p class="font-display text-2xl text-white font-semibold mb-2">{{ __('Équipements détaillés') }}</p>
                <p class="text-sable/80 text-sm leading-relaxed">{{ __('Literie, ventilation, électricité, sanitaires, Wi-Fi : chaque fiche tente liste précisément ce qui est inclus.') }}</p>
            </div>
            <div>
                <p class="font-display text-2xl text-white font-semibold mb-2">{{ __('Confirmation écrite') }}</p>
                <p class="text-sable/80 text-sm leading-relaxed">{{ __('Un email récapitule votre réservation : dates, montant, acompte, solde, politique d\'annulation et instructions d\'arrivée.') }}</p>
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="max-w-4xl mx-auto px-4 sm:px-6 py-20 text-center">
        <h2 class="font-display text-3xl font-semibold mb-4">{{ __('Une question avant de réserver ?') }}</h2>
        <p class="text-encre/70 mb-8">{{ __("Écrivez-nous directement sur WhatsApp, nous répondons rapidement.") }}</p>
        <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full bg-rouge px-8 py-3.5 text-sm font-semibold text-white hover:bg-rouge-dark transition">
            {{ __('Contacter sur WhatsApp') }}
        </a>
    </section>

@endsection
