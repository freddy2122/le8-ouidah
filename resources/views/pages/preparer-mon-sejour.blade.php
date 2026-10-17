@extends('layouts.app')

@section('title', __('Préparer mon séjour').' — Le 8')

@section('content')
<section class="max-w-4xl mx-auto px-4 sm:px-6 py-16">
    <h1 class="font-display text-4xl font-semibold mb-4">{{ __('Préparer mon séjour') }}</h1>
    <p class="text-encre/70 mb-12">{{ __('Tout ce qu\'il faut savoir avant d\'arriver à Ouidah, que vous veniez de Cotonou, de Lagos, de Paris ou d\'ailleurs.') }}</p>

    <div class="space-y-12">

        <div>
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Où se trouve le camp') }}</h2>
            <p class="text-encre/80 leading-relaxed">
                {{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }}.
                {{ __('Coordonnées GPS et lien Google Maps transmis par email après votre réservation.') }}
            </p>
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Depuis l\'aéroport de Cotonou') }}</h2>
            <p class="text-encre/80 leading-relaxed">
                {{ __('L\'aéroport international Cardinal-Bernardin-Gantin de Cotonou se trouve à environ 40 km du camp, soit 45 minutes à 1h de route selon le trafic. Deux options :') }}
            </p>
            <ul class="list-disc pl-5 mt-3 space-y-1 text-encre/80">
                <li>{{ __('Taxi ou VTC depuis l\'aéroport (à négocier ou réserver à l\'avance).') }}</li>
                <li>{{ __('Transfert organisé par Le 8 sur demande — contactez-nous par WhatsApp avant votre arrivée.') }}</li>
            </ul>
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Vers les sites des Vodun Days') }}</h2>
            <p class="text-encre/80 leading-relaxed">
                {{ __('Le camp est situé à Ouidah, à proximité des principaux lieux des festivités. Les distances précises selon les sites de l\'édition en cours vous seront communiquées avant votre arrivée — comptez généralement entre 5 et 20 minutes en véhicule.') }}
            </p>
        </div>

        <div class="grid sm:grid-cols-2 gap-10">
            <div>
                <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Arrivée et départ') }}</h2>
                <ul class="space-y-1 text-encre/80">
                    <li><strong>{{ __('Check-in :') }}</strong> {{ __('à partir de 14h00') }}</li>
                    <li><strong>{{ __('Check-out :') }}</strong> {{ __('avant 11h00') }}</li>
                </ul>
                <p class="text-xs text-encre/50 mt-2">{{ __('Arrivée tardive ou départ tardif : prévenez-nous par WhatsApp, nous ferons notre possible pour nous adapter.') }}</p>
            </div>

            <div>
                <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Sur place') }}</h2>
                <ul class="space-y-1 text-encre/80 text-sm">
                    <li>{{ __('Électricité 220V, prises de type européen (C/E) — les voyageurs venant du Nigeria ou du Royaume-Uni auront besoin d\'un adaptateur.') }}</li>
                    <li>{{ __('Internet : Wi-Fi disponible dans les tentes qui l\'incluent (voir chaque fiche tente).') }}</li>
                    <li>{{ __('Bagages : espace de rangement dans chaque tente ; consigne possible sur demande.') }}</li>
                    <li>{{ __('Sanitaires : voir le détail privé/partagé sur la fiche de chaque tente.') }}</li>
                </ul>
            </div>
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Sécurité') }}</h2>
            <p class="text-encre/80 leading-relaxed">
                {{ __('Le camp est clôturé et gardé de nuit. Comme dans tout déplacement, nous recommandons de souscrire une assurance voyage couvrant votre séjour au Bénin et de garder une copie de vos documents d\'identité.') }}
            </p>
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold mb-3">{{ __('Transport et location de voiture') }}</h2>
            <p class="text-encre/80 leading-relaxed">
                {{ __('Taxis et motos-taxis ("zémidjans") sont disponibles à Ouidah. La location de voiture avec chauffeur est recommandée pour les visiteurs internationaux ; nous pouvons vous mettre en relation avec des chauffeurs de confiance sur demande.') }}
            </p>
        </div>

        <div class="rounded-xl bg-sable p-6">
            <h2 class="font-display text-xl font-semibold mb-2">{{ __('Un contact sur place') }}</h2>
            <p class="text-encre/80 mb-4">{{ __('Pour toute question avant ou pendant votre séjour, écrivez-nous directement.') }}</p>
            <a href="{{ config('le8.company.whatsapp_link') }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full bg-rouge px-6 py-3 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                {{ __('Contacter sur WhatsApp') }}
            </a>
        </div>
    </div>
</section>
@endsection
