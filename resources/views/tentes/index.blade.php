@extends('layouts.app')

@section('title', __('Les tentes').' — Le 8')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
        <h1 class="font-display text-4xl font-semibold mb-3">{{ __('Nos tentes') }}</h1>
        <p class="text-encre/70 max-w-2xl mb-12">
            {{ __('Chaque fiche détaille la capacité, les dimensions, la literie, la ventilation, les sanitaires, l\'électricité et tout ce qui est réellement inclus — avant toute réservation.') }}
        </p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tents as $tent)
                <a href="{{ route('tentes.show', ['locale' => app()->getLocale(), 'tent' => $tent['slug']]) }}" class="group block rounded-2xl overflow-hidden border border-encre/10 hover:shadow-lg transition">
                    <div class="photo-placeholder h-56"></div>
                    <div class="p-6">
                        <h2 class="font-display text-xl font-semibold group-hover:text-rouge transition">{{ $tent['name'] }}</h2>
                        <p class="text-sm text-encre/70 mt-1">{{ $tent['tagline'] }}</p>

                        <ul class="mt-4 flex flex-wrap gap-2 text-xs text-encre/70">
                            <li class="bg-sable rounded-full px-3 py-1">{{ $tent['capacity_min'] }}–{{ $tent['capacity_max'] }} {{ __('pers.') }}</li>
                            @if ($tent['ac'])
                                <li class="bg-sable rounded-full px-3 py-1">{{ __('Climatisation') }}</li>
                            @endif
                            @if ($tent['wifi'])
                                <li class="bg-sable rounded-full px-3 py-1">Wi-Fi</li>
                            @endif
                        </ul>

                        <div class="mt-5 flex items-center justify-between">
                            <span class="font-semibold text-rouge">{{ \App\Support\Pricing::formatXof($tent['price_per_night_xof']) }} / {{ __('nuit') }}</span>
                            <span class="text-xs text-encre/50">
                                ≈ {{ \App\Support\Pricing::formatEur(\App\Support\Pricing::toEur($tent['price_per_night_xof'])) }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
