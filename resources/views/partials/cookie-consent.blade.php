<div id="cookie-banner"
     class="fixed inset-x-0 bottom-0 z-50 hidden bg-white border-t border-encre/10 shadow-[0_-4px_24px_rgba(0,0,0,0.08)]"
     data-meta-pixel-id="{{ config('le8.meta_pixel_id') }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5">

        {{-- Vue simple --}}
        <div id="cookie-banner-simple" class="flex flex-col lg:flex-row lg:items-center gap-4">
            <p class="text-sm text-encre/80 flex-1">
                {{ __("Nous utilisons des cookies essentiels au fonctionnement du site, et, avec votre accord, des cookies de mesure d'audience et publicitaires (Meta Pixel) pour comprendre d'où viennent nos visiteurs. Vous pouvez accepter, refuser, ou personnaliser votre choix à tout moment.") }}
                <a href="{{ route('pages.cookies', ['locale' => app()->getLocale()]) }}" class="underline hover:text-rouge">{{ __('En savoir plus') }}</a>
            </p>
            <div class="flex flex-wrap gap-3 shrink-0">
                <button type="button" id="cookie-customize" class="rounded-full border border-encre/20 px-5 py-2.5 text-sm font-medium hover:border-encre/40 transition">
                    {{ __('Personnaliser') }}
                </button>
                <button type="button" id="cookie-reject" class="rounded-full border border-encre/20 px-5 py-2.5 text-sm font-medium hover:border-encre/40 transition">
                    {{ __('Tout refuser') }}
                </button>
                <button type="button" id="cookie-accept" class="rounded-full bg-rouge px-5 py-2.5 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                    {{ __('Tout accepter') }}
                </button>
            </div>
        </div>

        {{-- Vue personnalisation --}}
        <div id="cookie-banner-advanced" class="hidden space-y-4">
            <p class="text-sm text-encre/80">{{ __('Choisissez les catégories de cookies que vous acceptez.') }}</p>

            <div class="space-y-3">
                <div class="flex items-center justify-between rounded-lg border border-encre/10 px-4 py-3">
                    <div>
                        <p class="text-sm font-medium">{{ __('Cookies strictement nécessaires') }}</p>
                        <p class="text-xs text-encre/60">{{ __('Indispensables au fonctionnement du site (panier de réservation, sécurité). Toujours actifs.') }}</p>
                    </div>
                    <input type="checkbox" checked disabled class="h-5 w-5 accent-rouge opacity-60">
                </div>
                <div class="flex items-center justify-between rounded-lg border border-encre/10 px-4 py-3">
                    <div>
                        <p class="text-sm font-medium">{{ __('Mesure d\'audience & publicité (Meta Pixel)') }}</p>
                        <p class="text-xs text-encre/60">{{ __('Nous aide à comprendre la provenance de nos visiteurs et à mesurer nos campagnes Instagram/Meta.') }}</p>
                    </div>
                    <input type="checkbox" id="cookie-marketing-toggle" class="h-5 w-5 accent-rouge">
                </div>
            </div>

            <div class="flex flex-wrap gap-3 justify-end">
                <button type="button" id="cookie-back" class="rounded-full border border-encre/20 px-5 py-2.5 text-sm font-medium hover:border-encre/40 transition">
                    {{ __('Retour') }}
                </button>
                <button type="button" id="cookie-save" class="rounded-full bg-rouge px-5 py-2.5 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                    {{ __('Enregistrer mes choix') }}
                </button>
            </div>
        </div>
    </div>
</div>
