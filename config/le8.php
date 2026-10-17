<?php

// Fiche d'identité de l'entreprise, données de contact, taux de change
// et inventaire des tentes. À remplacer par les vraies informations de
// l'entreprise avant mise en production (voir les valeurs marquées "À COMPLÉTER").

return [

    'company' => [
        'legal_name' => 'Le 8 SARL', // À COMPLÉTER : raison sociale exacte, forme juridique réelle
        'brand_name' => 'Le 8',
        'rccm' => 'RCCM À COMPLÉTER', // numéro de registre du commerce béninois
        'ifu' => 'IFU À COMPLÉTER', // identifiant fiscal unique
        'address' => [
            'line1' => 'Route des Pêches, Ouidah', // À COMPLÉTER : adresse précise
            'city' => 'Ouidah',
            'country' => 'Bénin',
            'country_code' => 'BJ',
        ],
        'phone_display' => '+229 00 00 00 00', // À COMPLÉTER
        'whatsapp' => '+229 00 00 00 00', // À COMPLÉTER
        'whatsapp_link' => 'https://wa.me/22900000000', // À COMPLÉTER
        'email' => 'contact@le8-ouidah.com', // À COMPLÉTER
        'instagram' => 'https://instagram.com/le8.ouidah', // À COMPLÉTER
        'coordinates' => [
            'lat' => 6.3614, // À COMPLÉTER : coordonnées GPS réelles du camp
            'lng' => 2.0859,
        ],
    ],

    // Clause de non-affiliation : à afficher clairement sur le site.
    'disclaimer_vodun_days' => true,

    // Identifiant Meta Pixel — À COMPLÉTER une fois le compte Meta Business créé.
    // Le pixel n'est chargé qu'après consentement explicite (voir cookie-consent.js).
    'meta_pixel_id' => env('META_PIXEL_ID'),

    // Taux de change affichés à titre indicatif uniquement. Le XOF reste
    // la seule devise contractuelle (prix affiché et facturé).
    'currency' => [
        'base' => 'XOF',
        // Taux fixe officiel (parité XOF/EUR garantie par traité, UEMOA/Trésor français) : 1 EUR = 655.957 XOF.
        'eur_rate_fixed' => 655.957,
        // Taux flottant, mis à jour manuellement — À METTRE À JOUR RÉGULIÈREMENT.
        'ngn_rate_approx' => 2.45, // 1 XOF ≈ 2,45 NGN (ordre de grandeur mi-2026, voir sources de change en direct)
        'ngn_rate_updated_at' => '2026-10-17',
    ],

    // Politique d'annulation, répétée partout où un prix est affiché.
    'cancellation_policy' => [
        'deposit_percent' => 50,
        'deposit_refundable' => false,
    ],

    // Inventaire des tentes. Données d'exemple à valider / remplacer par
    // l'inventaire réel (photos, tarifs, disponibilités) avant lancement.
    'tents' => [
        [
            'slug' => 'tente-baobab',
            'name' => 'Tente Baobab',
            'tagline' => 'Tente standard, idéale pour un séjour en solo ou en duo',
            'capacity_min' => 1,
            'capacity_max' => 2,
            'dimensions' => '3 m × 3 m (environ 9 m²), hauteur sous toile 2,1 m',
            'bedding' => '1 lit double (140×190) ou 2 lits simples sur demande, draps et oreillers fournis',
            'ventilation' => 'Ventilateur sur pied, moustiquaire intégrale sur toutes les ouvertures',
            'ac' => false,
            'electricity' => true,
            'outlets' => '1 prise double (220V, norme européenne/CEI)',
            'lighting' => 'Éclairage LED intérieur + lampe torche fournie',
            'bathroom' => 'Douches et toilettes communes, à moins de 30 m, accès 24h/24',
            'water' => "Eau courante, eau chaude aux heures d'affluence",
            'wifi' => true,
            'cleaning' => 'Ménage quotidien inclus',
            'parking' => 'Parking surveillé inclus',
            'security' => 'Gardiennage de nuit, camp clôturé',
            'price_per_night_xof' => 25000,
            'photos' => [],
        ],
        [
            'slug' => 'tente-savane',
            'name' => 'Tente Savane',
            'tagline' => "Tente familiale, jusqu'à 3 personnes",
            'capacity_min' => 1,
            'capacity_max' => 3,
            'dimensions' => '4 m × 4 m (environ 16 m²), hauteur sous toile 2,3 m',
            'bedding' => '1 lit double (140×190) + 1 lit simple, draps et oreillers fournis',
            'ventilation' => 'Ventilateur sur pied, moustiquaire intégrale sur toutes les ouvertures',
            'ac' => false,
            'electricity' => true,
            'outlets' => '2 prises (220V, norme européenne/CEI)',
            'lighting' => 'Éclairage LED intérieur + lampe torche fournie',
            'bathroom' => 'Douches et toilettes communes, à moins de 30 m, accès 24h/24',
            'water' => "Eau courante, eau chaude aux heures d'affluence",
            'wifi' => true,
            'cleaning' => 'Ménage quotidien inclus',
            'parking' => 'Parking surveillé inclus',
            'security' => 'Gardiennage de nuit, camp clôturé',
            'price_per_night_xof' => 30000,
            'photos' => [],
        ],
        [
            'slug' => 'tente-premium',
            'name' => 'Tente Premium',
            'tagline' => 'Notre meilleur confort, salle de bain privée et climatisation',
            'capacity_min' => 1,
            'capacity_max' => 3,
            'dimensions' => '5 m × 4 m (environ 20 m²), hauteur sous toile 2,4 m',
            'bedding' => '1 lit double (160×200) + 1 lit simple possible, literie haut de gamme fournie',
            'ventilation' => 'Climatisation individuelle + ventilateur, moustiquaire intégrale',
            'ac' => true,
            'electricity' => true,
            'outlets' => '3 prises (220V, norme européenne/CEI)',
            'lighting' => 'Éclairage LED intérieur et extérieur privatif',
            'bathroom' => 'Douche et WC privés, attenants à la tente',
            'water' => "Eau courante, eau chaude 24h/24",
            'wifi' => true,
            'cleaning' => 'Ménage quotidien inclus',
            'parking' => 'Parking surveillé inclus',
            'security' => 'Gardiennage de nuit, camp clôturé',
            'price_per_night_xof' => 35000,
            'photos' => [],
        ],
    ],
];
