(function () {
    'use strict';

    var toggle = document.getElementById('nav-toggle');
    var menu = document.getElementById('nav-mobile');

    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            var expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            menu.classList.toggle('hidden');
        });
    }
})();
