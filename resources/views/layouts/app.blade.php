<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name').' — Hébergement en tentes à Ouidah, Bénin')</title>
    <meta name="description" content="@yield('description', __('Le 8 — hébergement indépendant en tentes à Ouidah, à proximité des Vodun Days. Réservation transparente, tarifs en FCFA.'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Poppins (texte courant) + Fraunces en police d'appoint gratuite en attendant
         l'achat de la licence web de Gliker (police commerciale, non disponible sur
         Google Fonts — voir config/le8.php et la note transmise à l'équipe).
         Permanent Marker : accent "feutre" ponctuel (logo, quelques touches), dans le
         même esprit que le lettrage à la main utilisé par d'autres acteurs culturels
         de la région — volontairement pas une imitation d'un logo existant. --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Permanent+Marker&display=swap" rel="stylesheet">

    {{-- Tailwind CSS via CDN : aucun node_modules, aucune étape de build --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        rouge: {
                            DEFAULT: '#B3272D',
                            dark: '#7A1B1F',
                            light: '#D9534F',
                        },
                        sable: '#F7F1E6',
                        encre: '#241714',
                    },
                    fontFamily: {
                        display: ['"Fraunces"', 'Georgia', 'serif'],
                        body: ['Poppins', 'system-ui', 'sans-serif'],
                        marker: ['"Permanent Marker"', 'cursive'],
                    },
                },
            },
        };
    </script>

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body class="font-body antialiased bg-white text-encre">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.cookie-consent')

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/cookie-consent.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
