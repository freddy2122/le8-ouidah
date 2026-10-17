(function () {
    'use strict';

    var STORAGE_KEY = 'le8_cookie_consent_v1';

    var banner = document.getElementById('cookie-banner');
    if (!banner) return;

    var simple = document.getElementById('cookie-banner-simple');
    var advanced = document.getElementById('cookie-banner-advanced');
    var marketingToggle = document.getElementById('cookie-marketing-toggle');

    function readConsent() {
        try {
            var raw = localStorage.getItem(STORAGE_KEY);
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function writeConsent(consent) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(consent));
        } catch (e) {
            /* localStorage indisponible : le consentement ne sera pas mémorisé entre les visites */
        }
    }

    function applyConsent(consent) {
        if (consent.marketing) {
            loadMetaPixel();
        }
    }

    function loadMetaPixel() {
        var pixelId = banner.getAttribute('data-meta-pixel-id');
        if (!pixelId || window.__le8PixelLoaded) return;
        window.__le8PixelLoaded = true;

        /* eslint-disable */
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        /* eslint-enable */
        window.fbq('init', pixelId);
        window.fbq('track', 'PageView');
    }

    function hideBanner() {
        banner.classList.add('hidden');
    }

    function showBanner(advancedView) {
        banner.classList.remove('hidden');
        if (advancedView) {
            simple.classList.add('hidden');
            advanced.classList.remove('hidden');
        } else {
            simple.classList.remove('hidden');
            advanced.classList.add('hidden');
        }
    }

    var existing = readConsent();
    if (existing) {
        applyConsent(existing);
    } else {
        showBanner(false);
    }

    var acceptBtn = document.getElementById('cookie-accept');
    var rejectBtn = document.getElementById('cookie-reject');
    var customizeBtn = document.getElementById('cookie-customize');
    var backBtn = document.getElementById('cookie-back');
    var saveBtn = document.getElementById('cookie-save');
    var footerSettingsBtn = document.getElementById('footer-cookie-settings');

    if (acceptBtn) acceptBtn.addEventListener('click', function () {
        var consent = { necessary: true, marketing: true, date: new Date().toISOString() };
        writeConsent(consent);
        applyConsent(consent);
        hideBanner();
    });

    if (rejectBtn) rejectBtn.addEventListener('click', function () {
        var consent = { necessary: true, marketing: false, date: new Date().toISOString() };
        writeConsent(consent);
        hideBanner();
    });

    if (customizeBtn) customizeBtn.addEventListener('click', function () {
        showBanner(true);
    });

    if (backBtn) backBtn.addEventListener('click', function () {
        showBanner(false);
    });

    if (saveBtn) saveBtn.addEventListener('click', function () {
        var consent = {
            necessary: true,
            marketing: !!(marketingToggle && marketingToggle.checked),
            date: new Date().toISOString(),
        };
        writeConsent(consent);
        applyConsent(consent);
        hideBanner();
    });

    // Permet de rouvrir le panneau et de retirer son consentement à tout moment
    // (lien "Gérer mes cookies" dans le pied de page).
    if (footerSettingsBtn) footerSettingsBtn.addEventListener('click', function () {
        var current = readConsent();
        if (marketingToggle) marketingToggle.checked = !!(current && current.marketing);
        showBanner(true);
    });
})();
