@extends('layouts.app')

@section('title', __('Conditions générales de vente').' — Le 8')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-3">{{ __('Conditions générales de vente') }}</h1>
    <p class="text-sm text-encre/50 mb-10">{{ __('Dernière mise à jour : à compléter avant mise en ligne.') }}</p>

    <div class="prose max-w-none text-encre/80 leading-relaxed space-y-8 text-sm">

        <div class="rounded-lg bg-rouge/10 border border-rouge/30 p-4 text-rouge-dark">
            {{ __('⚠ Ce document est une base de travail générée pour accélérer la mise en place du site. Il doit être relu et validé par un professionnel du droit (droit béninois et droit de la consommation des pays ciblés) avant toute mise en ligne.') }}
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('1. Identification du vendeur') }}</h2>
            <p>
                {{ config('le8.company.legal_name') }}, {{ __('immatriculée au registre du commerce et du crédit mobilier (RCCM) sous le numéro') }} {{ config('le8.company.rccm') }},
                {{ __('IFU') }} {{ config('le8.company.ifu') }},
                {{ __('dont le siège est situé') }} {{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }}.
                {{ __('Contact :') }} {{ config('le8.company.email') }} — {{ config('le8.company.phone_display') }}.
            </p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('2. Objet') }}</h2>
            <p>{{ __('Les présentes conditions régissent la réservation d\'hébergement en tente proposée par Le 8 à Ouidah, Bénin. Le 8 est un hébergement indépendant et n\'est affilié à aucune organisation, institution ou événement officiel, notamment pas à l\'organisation des Vodun Days.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('3. Processus de réservation') }}</h2>
            <p>{{ __('La demande de réservation effectuée en ligne constitue une pré-réservation. Elle est confirmée définitivement après réception de l\'acompte par Le 8, selon les instructions de paiement transmises par email ou WhatsApp après la demande.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('4. Prix et paiement') }}</h2>
            <p>{{ __('Les prix sont exprimés en Francs CFA (XOF), seule devise contractuelle. Les équivalents affichés en euros (EUR) et nairas (NGN) sont indicatifs et non contractuels. Un acompte de :percent% du montant total est dû à la réservation. Le solde est réglé sur place, le jour de l\'arrivée.', ['percent' => config('le8.cancellation_policy.deposit_percent')]) }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('5. Politique d\'annulation') }}</h2>
            <p>{{ __('L\'acompte versé à la réservation n\'est pas remboursable en cas d\'annulation par le client, quel qu\'en soit le motif, sauf accord exprès de Le 8.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('6. Droit de rétractation') }}</h2>
            <p>{{ __('Conformément à la réglementation européenne applicable aux consommateurs de l\'Union européenne (notamment l\'article 16, point l, de la directive 2011/83/UE relative aux droits des consommateurs), le droit de rétractation de 14 jours ne s\'applique pas aux prestations d\'hébergement fournies à une date ou à une période déterminée. La réservation n\'est donc pas annulable sans frais au titre de ce droit, ce qui ne remet pas en cause les conditions d\'annulation claires et équitables décrites à l\'article 5 ci-dessus.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('7. Confirmation de réservation') }}</h2>
            <p>{{ __('Un email de confirmation est envoyé à chaque étape significative de la réservation (demande reçue, puis confirmation après paiement de l\'acompte), reprenant les dates, la catégorie de tente, le nombre de personnes, le montant total, l\'acompte versé, le solde restant, la politique d\'annulation, l\'adresse du camp, le contact WhatsApp et les instructions d\'arrivée.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('8. Obligations du client') }}</h2>
            <p>{{ __('Le client s\'engage à fournir des informations exactes lors de la réservation et à respecter le règlement intérieur du camp communiqué avant son arrivée.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('9. Droit applicable et litiges') }}</h2>
            <p>{{ __('Les présentes conditions sont soumises au droit béninois, sans préjudice des dispositions impératives de protection des consommateurs éventuellement applicables dans le pays de résidence du client. Tout litige sera, en priorité, résolu à l\'amiable.') }}</p>
        </div>

        <div>
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('10. Contact') }}</h2>
            <p>{{ config('le8.company.email') }} — WhatsApp {{ config('le8.company.whatsapp') }}</p>
        </div>
    </div>
</section>
@endsection
