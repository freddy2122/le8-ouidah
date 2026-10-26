@extends('layouts.app')

@section('title', __('Restauration & expériences culinaires').' — Le 8')

@section('content')

    <section class="photo-placeholder h-[40vh] min-h-[320px]"></section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
        <h1 class="font-display text-4xl font-semibold mb-4">{{ __('Restauration & expériences culinaires') }}</h1>
        <p class="text-encre/70 max-w-2xl mb-12">
            {{ __('Au-delà de l\'hébergement, Le 8 vous fait découvrir les saveurs du Bénin — sur place ou à travers des expériences organisées.') }}
        </p>

        {{-- RESTAURANT --}}
        <div class="mb-20">
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Restaurant sur place') }}</h2>
            <p class="text-encre/80 max-w-2xl mb-8">{{ $dining['restaurant']['description'] }}</p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($dining['restaurant']['menu'] as $item)
                    <div class="rounded-2xl overflow-hidden border border-encre/10 hover:shadow-lg transition">
                        <div class="photo-placeholder h-36"></div>
                        <div class="p-5">
                            <h3 class="text-sm font-semibold leading-snug">{{ $item['name'] }}</h3>
                            <p class="mt-3 text-sm font-semibold text-rouge">{{ \App\Support\Pricing::formatXof($item['price_xof']) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-xs text-encre/50 mt-4">
                {{ __('Carte à titre indicatif. Facturé séparément de la réservation de tente, à régler sur place.') }}
            </p>
        </div>

        {{-- EXPERIENCES --}}
        <div>
            <h2 class="font-display text-2xl font-semibold mb-6">{{ __('Expériences culinaires') }}</h2>

            <div class="grid sm:grid-cols-2 gap-8">
                @foreach ($dining['experiences'] as $experience)
                    <div class="rounded-2xl overflow-hidden border border-encre/10 hover:shadow-lg transition">
                        <div class="photo-placeholder h-48"></div>
                        <div class="p-6">
                            <h3 class="font-display text-lg font-semibold mb-2">{{ $experience['name'] }}</h3>
                            <p class="text-sm text-encre/70 mb-4">{{ $experience['description'] }}</p>
                            <p class="text-sm font-semibold text-rouge">
                                {{ \App\Support\Pricing::formatXof($experience['price_xof_per_person']) }} {{ __('/ personne') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-16 rounded-xl bg-sable p-6 text-center">
            <p class="text-encre/80 mb-4">{{ __('Sur réservation, idéalement 24h à l\'avance.') }}</p>
            <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full bg-rouge px-6 py-3 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                {{ __('Réserver sur WhatsApp') }}
            </a>
        </div>
    </section>

@endsection
