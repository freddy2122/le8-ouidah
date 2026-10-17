@php
    $company = config('le8.company');
    $currentLocale = app()->getLocale();

    $localeUrl = function (string $target) {
        try {
            $params = request()->route()?->parameters() ?? [];
            $params['locale'] = $target;

            return route(request()->route()?->getName() ?? 'home', $params);
        } catch (\Throwable $e) {
            return url('/'.$target);
        }
    };
@endphp

{{-- Bandeau de confiance : identité, contact direct, non-affiliation Vodun Days --}}
<div class="bg-encre text-sable text-xs sm:text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-2 flex flex-wrap items-center justify-between gap-2">
        <p class="flex flex-wrap items-center gap-x-4 gap-y-1">
            <span>{{ $company['address']['line1'] }}, {{ $company['address']['country'] }}</span>
            <a href="tel:{{ $company['phone_display'] }}" class="hover:text-rouge-light transition">{{ __('Tél.') }} {{ $company['phone_display'] }}</a>
            <a href="{{ $company['whatsapp_link'] }}" target="_blank" rel="noopener" class="hover:text-rouge-light transition">WhatsApp</a>
            <a href="mailto:{{ $company['email'] }}" class="hover:text-rouge-light transition">{{ $company['email'] }}</a>
        </p>
        <div class="flex items-center gap-3">
            <a href="{{ $localeUrl('fr') }}" class="{{ $currentLocale === 'fr' ? 'text-white font-semibold' : 'text-sable/70 hover:text-white' }}">FR</a>
            <span class="text-sable/40">/</span>
            <a href="{{ $localeUrl('en') }}" class="{{ $currentLocale === 'en' ? 'text-white font-semibold' : 'text-sable/70 hover:text-white' }}">EN</a>
        </div>
    </div>
</div>

<header class="bg-white border-b border-encre/10 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16 sm:h-20">
            <a href="{{ route('home', ['locale' => $currentLocale]) }}" class="font-marker text-2xl sm:text-3xl text-rouge">
                Le 8
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home', ['locale' => $currentLocale]) }}" class="hover:text-rouge transition">{{ __('Accueil') }}</a>
                <a href="{{ route('tentes.index', ['locale' => $currentLocale]) }}" class="hover:text-rouge transition">{{ __('Les tentes') }}</a>
                <a href="{{ route('pages.prepare-stay', ['locale' => $currentLocale]) }}" class="hover:text-rouge transition">{{ __('Préparer mon séjour') }}</a>
                <a href="{{ route('pages.about', ['locale' => $currentLocale]) }}" class="hover:text-rouge transition">{{ __('À propos') }}</a>
            </nav>

            <a href="{{ route('reservation.create', ['locale' => $currentLocale]) }}"
               class="hidden md:inline-flex items-center rounded-full bg-rouge px-5 py-2.5 text-sm font-semibold text-white hover:bg-rouge-dark transition">
                {{ __('Réserver') }}
            </a>

            <button id="nav-toggle" type="button" class="md:hidden p-2" aria-label="{{ __('Ouvrir le menu') }}" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <nav id="nav-mobile" class="hidden md:hidden border-t border-encre/10 bg-white px-4 py-4 space-y-3 text-sm font-medium">
        <a href="{{ route('home', ['locale' => $currentLocale]) }}" class="block hover:text-rouge transition">{{ __('Accueil') }}</a>
        <a href="{{ route('tentes.index', ['locale' => $currentLocale]) }}" class="block hover:text-rouge transition">{{ __('Les tentes') }}</a>
        <a href="{{ route('pages.prepare-stay', ['locale' => $currentLocale]) }}" class="block hover:text-rouge transition">{{ __('Préparer mon séjour') }}</a>
        <a href="{{ route('pages.about', ['locale' => $currentLocale]) }}" class="block hover:text-rouge transition">{{ __('À propos') }}</a>
        <a href="{{ route('reservation.create', ['locale' => $currentLocale]) }}" class="block rounded-full bg-rouge px-5 py-2.5 text-center text-white font-semibold">
            {{ __('Réserver') }}
        </a>
    </nav>
</header>
