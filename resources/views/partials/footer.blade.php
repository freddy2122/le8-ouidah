@php $company = config('le8.company'); @endphp

<footer class="bg-encre text-sable">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14 grid gap-10 md:grid-cols-4">
        <div>
            <p class="font-marker text-2xl text-white">Le 8</p>
            <p class="mt-3 text-sm text-sable/80 leading-relaxed">
                {{ __("Le 8 est un hébergement indépendant en tentes à Ouidah, Bénin. Nous ne sommes affiliés à aucune organisation, institution ou événement officiel — notamment pas à l'organisation des Vodun Days — et accueillons les voyageurs qui se rendent dans la région à l'occasion de ces festivités comme à toute autre période de l'année.") }}
            </p>
        </div>

        <div>
            <p class="font-semibold text-white mb-3">{{ __('Nous contacter') }}</p>
            <ul class="space-y-2 text-sm text-sable/80">
                <li>{{ $company['legal_name'] }}</li>
                <li>{{ $company['address']['line1'] }}</li>
                <li>{{ $company['address']['city'] }}, {{ $company['address']['country'] }}</li>
                <li><a href="tel:{{ $company['phone_display'] }}" class="hover:text-white transition">{{ __('Tél.') }} {{ $company['phone_display'] }}</a></li>
                <li><a href="{{ $company['whatsapp_link'] }}" target="_blank" rel="noopener" class="hover:text-white transition">WhatsApp {{ $company['whatsapp'] }}</a></li>
                <li><a href="mailto:{{ $company['email'] }}" class="hover:text-white transition">{{ $company['email'] }}</a></li>
                <li><a href="{{ $company['instagram'] }}" target="_blank" rel="noopener" class="hover:text-white transition">Instagram</a></li>
            </ul>
        </div>

        <div>
            <p class="font-semibold text-white mb-3">{{ __('Le camp') }}</p>
            <ul class="space-y-2 text-sm text-sable/80">
                <li><a href="{{ route('tentes.index', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Les tentes') }}</a></li>
                <li><a href="{{ route('pages.dining', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Restauration') }}</a></li>
                <li><a href="{{ route('pages.prepare-stay', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Préparer mon séjour') }}</a></li>
                <li><a href="{{ route('reservation.create', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Réserver') }}</a></li>
                <li><a href="{{ route('pages.about', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('À propos') }}</a></li>
            </ul>
        </div>

        <div>
            <p class="font-semibold text-white mb-3">{{ __('Informations légales') }}</p>
            <ul class="space-y-2 text-sm text-sable/80">
                <li><a href="{{ route('pages.terms', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Conditions générales de vente') }}</a></li>
                <li><a href="{{ route('pages.privacy', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Politique de confidentialité') }}</a></li>
                <li><a href="{{ route('pages.cookies', ['locale' => app()->getLocale()]) }}" class="hover:text-white transition">{{ __('Politique de cookies') }}</a></li>
                <li><button type="button" id="footer-cookie-settings" class="underline underline-offset-2 hover:text-white transition">{{ __('Gérer mes cookies') }}</button></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-sable/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 text-xs text-sable/60 flex flex-wrap items-center justify-between gap-2">
            <p>&copy; {{ date('Y') }} {{ $company['legal_name'] }} — {{ __('Tous droits réservés.') }}</p>
            <p>{{ __('Hébergement indépendant — non affilié aux Vodun Days.') }}</p>
        </div>
    </div>
</footer>
