@extends('layouts.app')

@section('title', $tent['name'].' — Le 8')

@php
    $features = [
        ['label' => __('Capacité'), 'value' => $tent['capacity_min'].'–'.$tent['capacity_max'].' '.__('personnes')],
        ['label' => __('Dimensions'), 'value' => $tent['dimensions']],
        ['label' => __('Literie'), 'value' => $tent['bedding']],
        ['label' => __('Ventilation / climatisation'), 'value' => $tent['ventilation']],
        ['label' => __('Moustiquaire'), 'value' => __('Intégrale sur toutes les ouvertures')],
        ['label' => __('Électricité'), 'value' => $tent['electricity'] ? $tent['outlets'] : __('Non disponible')],
        ['label' => __('Éclairage'), 'value' => $tent['lighting']],
        ['label' => __('Sanitaires'), 'value' => $tent['bathroom']],
        ['label' => __('Eau'), 'value' => $tent['water']],
        ['label' => __('Wi-Fi'), 'value' => $tent['wifi'] ? __('Inclus') : __('Non disponible')],
        ['label' => __('Ménage'), 'value' => $tent['cleaning']],
        ['label' => __('Parking'), 'value' => $tent['parking']],
        ['label' => __('Sécurité'), 'value' => $tent['security']],
    ];
@endphp

@section('content')
    <section class="photo-placeholder h-[40vh] min-h-[320px]"></section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 grid lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2">
            <a href="{{ route('tentes.index', ['locale' => app()->getLocale()]) }}" class="text-sm text-encre/60 hover:text-rouge">&larr; {{ __('Toutes les tentes') }}</a>
            <h1 class="font-display text-4xl font-semibold mt-3">{{ $tent['name'] }}</h1>
            <p class="text-encre/70 mt-2 text-lg">{{ $tent['tagline'] }}</p>

            <h2 class="font-display text-2xl font-semibold mt-10 mb-5">{{ __('Ce qui est inclus') }}</h2>
            <dl class="grid sm:grid-cols-2 gap-x-8 gap-y-5">
                @foreach ($features as $feature)
                    <div class="border-b border-encre/10 pb-3">
                        <dt class="text-xs uppercase tracking-wide text-encre/50">{{ $feature['label'] }}</dt>
                        <dd class="text-sm mt-1">{{ $feature['value'] }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="mt-10 rounded-xl bg-sable p-6">
                <p class="font-semibold mb-1">{{ __('Politique d\'annulation') }}</p>
                <p class="text-sm text-encre/80">
                    {{ __('Un acompte de :percent% est demandé à la réservation. Il n\'est pas remboursable en cas d\'annulation. Le solde est à régler sur place.', ['percent' => config('le8.cancellation_policy.deposit_percent')]) }}
                    <a href="{{ route('pages.terms', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge">{{ __('Voir les conditions générales de vente') }}</a>.
                </p>
            </div>
        </div>

        {{-- Carte prix / réservation --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28 rounded-2xl border border-encre/10 p-6">
                <p class="text-2xl font-semibold text-rouge">{{ \App\Support\Pricing::formatXof($tent['price_per_night_xof']) }}</p>
                <p class="text-xs text-encre/60 mb-1">{{ __('par nuit, prix contractuel en FCFA') }}</p>
                <p class="text-xs text-encre/50">
                    ≈ {{ \App\Support\Pricing::formatEur(\App\Support\Pricing::toEur($tent['price_per_night_xof'])) }}
                    ·
                    ≈ {{ \App\Support\Pricing::formatNgn(\App\Support\Pricing::toNgn($tent['price_per_night_xof'])) }}
                    <span class="block">{{ __('Conversion indicative, non contractuelle.') }}</span>
                </p>

                <a href="{{ route('reservation.create', ['locale' => app()->getLocale(), 'tent' => $tent['slug']]) }}"
                   class="mt-5 block text-center rounded-full bg-rouge px-6 py-3 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                    {{ __('Réserver cette tente') }}
                </a>

                <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="mt-3 block text-center rounded-full border border-encre/20 px-6 py-3 text-sm font-semibold hover:border-encre/40 transition">
                    {{ __('Une question ? WhatsApp') }}
                </a>
            </div>
        </aside>
    </section>
@endsection
