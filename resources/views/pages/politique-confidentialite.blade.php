@extends('layouts.app')

@section('title', __('Politique de confidentialité').' — Le 8')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-3">{{ __('Politique de confidentialité') }}</h1>
    <p class="text-sm text-encre/50 mb-10">{{ __('Dernière mise à jour : à compléter avant mise en ligne.') }}</p>

    <div class="prose max-w-none text-encre/80 leading-relaxed space-y-8 text-sm">

        <div class="rounded-lg bg-rouge/10 border border-rouge/30 p-4 text-rouge-dark">
            {{ __('⚠ Ce document est une base de travail générée pour accélérer la mise en place du site. Un point doit impérativement être tranché avec un professionnel du droit avant le lancement des campagnes publicitaires européennes : la désignation éventuelle d\'un représentant dans l\'Union européenne au titre de l\'article 27 du RGPD (une entreprise hors UE ciblant des résidents européens peut y être tenue, avec une exception pour certains traitements occasionnels et à faible risque).') }}
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('1. Responsable du traitement') }}</h2>
            <p>{{ config('le8.company.legal_name') }}, {{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }} — {{ config('le8.company.email') }}.</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('2. Données collectées') }}</h2>
            <ul class="list-disc pl-5 space-y-1">
                <li>{{ __('Données de réservation : nom, email, téléphone, dates de séjour, nombre de personnes.') }}</li>
                <li>{{ __('Données de navigation et cookies, selon vos choix de consentement (voir notre') }} <a href="{{ route('pages.cookies', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge">{{ __('politique de cookies') }}</a>).</li>
            </ul>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('3. Finalités et bases légales') }}</h2>
            <ul class="list-disc pl-5 space-y-1">
                <li>{{ __('Traitement des réservations et communication avec le client : exécution d\'une mesure précontractuelle puis du contrat.') }}</li>
                <li>{{ __('Mesure d\'audience et publicité ciblée (Meta Pixel) : uniquement sur la base de votre consentement, recueilli via le bandeau cookies.') }}</li>
            </ul>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('4. Durée de conservation') }}</h2>
            <p>{{ __('Les données de réservation sont conservées le temps nécessaire à la gestion du séjour puis archivées pour nos obligations comptables. Les données liées au consentement cookies sont conservées 13 mois maximum.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('5. Destinataires et transferts') }}</h2>
            <p>{{ __('Vos données peuvent être transmises à Meta Platforms Ireland Ltd dans le cadre du Meta Pixel (uniquement avec votre consentement), ainsi qu\'à nos prestataires techniques (hébergement, email). Le 8 étant basé au Bénin, pays non reconnu comme offrant un niveau de protection adéquat par la Commission européenne, tout transfert de données hors Union européenne s\'appuie sur les garanties appropriées prévues par le RGPD (notamment les clauses contractuelles types).') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('6. Vos droits') }}</h2>
            <p>{{ __('Pour les résidents de l\'Union européenne et dans la mesure prévue par le RGPD, vous disposez d\'un droit d\'accès, de rectification, d\'effacement, de limitation, d\'opposition et de portabilité de vos données, ainsi que du droit de retirer votre consentement à tout moment. Pour exercer ces droits, contactez-nous à') }} {{ config('le8.company.email') }}. {{ __('Vous disposez également du droit d\'introduire une réclamation auprès de l\'autorité de protection des données de votre pays de résidence.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('7. Cookies') }}</h2>
            <p>{{ __('Voir notre') }} <a href="{{ route('pages.cookies', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge">{{ __('politique de cookies') }}</a> {{ __('dédiée.') }}</p>
        </div>
    </div>
</section>
@endsection
