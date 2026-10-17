@extends('layouts.app')

@section('title', __('À propos').' — Le 8')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-8">{{ __('À propos de Le 8') }}</h1>

    <div class="prose prose-lg max-w-none text-encre/80 leading-relaxed space-y-5">
        <p>{{ __('Bienvenue dans un univers où hospitalité et évasion se rencontrent.') }}</p>
        <p>{{ __('L\'accueil, le sens du détail et l\'art de recevoir : nous vous invitons à vivre une expérience simple et sincère, où chaque séjour devient un moment mémorable.') }}</p>
        <p>{{ __('Spécialisés dans l\'hébergement à Ouidah, nous mettons notre connaissance du terrain, notre créativité et notre engagement au service de votre confort. Que vous veniez pour les Vodun Days ou pour découvrir la région à tout autre moment de l\'année, nous vous accompagnons avec professionnalisme et attention.') }}</p>
        <p>{{ __('Notre ambition est simple : que votre séjour soit authentique, confortable et sans mauvaise surprise — du premier contact jusqu\'à votre départ.') }}</p>
    </div>

    <div class="mt-12 rounded-xl bg-sable p-6 text-sm text-encre/80">
        <p class="font-semibold mb-2">{{ __('Important') }}</p>
        <p>{{ __('Le 8 est un hébergement indépendant. Nous ne sommes affiliés à aucune organisation, institution ou événement officiel — notamment pas à l\'organisation des Vodun Days.') }}</p>
    </div>

    <div class="mt-10 text-sm text-encre/80 space-y-1">
        <p class="font-semibold text-encre">{{ config('le8.company.legal_name') }}</p>
        <p>{{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }}</p>
        <p>{{ __('Tél.') }} {{ config('le8.company.phone_display') }} — {{ config('le8.company.email') }}</p>
    </div>
</section>
@endsection
