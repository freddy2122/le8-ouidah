@extends('layouts.app')

@section('title', __('Politique de cookies').' — Le 8')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-3">{{ __('Politique de cookies') }}</h1>
    <p class="text-sm text-encre/50 mb-10">{{ __('Dernière mise à jour : à compléter avant mise en ligne.') }}</p>

    <div class="prose max-w-none text-encre/80 leading-relaxed space-y-8 text-sm">

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Qu\'est-ce qu\'un cookie ?') }}</h2>
            <p>{{ __('Un cookie est un petit fichier déposé sur votre appareil lors de votre visite, permettant de mémoriser des informations sur votre navigation.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Les cookies que nous utilisons') }}</h2>
            <table class="w-full text-left border-collapse mt-3">
                <thead>
                    <tr class="border-b border-encre/20">
                        <th class="py-2 pr-4">{{ __('Catégorie') }}</th>
                        <th class="py-2 pr-4">{{ __('Finalité') }}</th>
                        <th class="py-2">{{ __('Consentement requis') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-encre/10">
                        <td class="py-2 pr-4 font-medium">{{ __('Strictement nécessaires') }}</td>
                        <td class="py-2 pr-4">{{ __('Fonctionnement du site, sécurité, mémorisation de vos choix cookies.') }}</td>
                        <td class="py-2">{{ __('Non') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 font-medium">{{ __('Mesure d\'audience & publicité (Meta Pixel)') }}</td>
                        <td class="py-2 pr-4">{{ __('Mesure de nos campagnes Instagram/Meta, publicité ciblée.') }}</td>
                        <td class="py-2">{{ __('Oui') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Votre consentement') }}</h2>
            <p>{{ __('Les cookies non essentiels (dont le Meta Pixel) ne sont déposés qu\'après votre consentement explicite, recueilli via le bandeau affiché lors de votre première visite. Vous pouvez à tout moment modifier ou retirer votre consentement en cliquant sur « Gérer mes cookies » en pied de page.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Durée de conservation du consentement') }}</h2>
            <p>{{ __('Votre choix est mémorisé 13 mois maximum, après quoi le bandeau vous sera présenté à nouveau.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Contact') }}</h2>
            <p>{{ config('le8.company.email') }}</p>
        </div>
    </div>
</section>
@endsection
