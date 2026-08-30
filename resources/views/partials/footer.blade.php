<footer class="mt-5 py-4 text-center text-white"
        style="background:#0F4C81;">

    <div class="container">

        <p class="mb-1 fw-semibold">
            {{ app()->getLocale() == 'ar'
                ? 'بوابة النصوص القانونية'
                : 'Portail des Textes Juridiques' }}
        </p>

        <p class="mb-0 small">
            {{ app()->getLocale() == 'ar'
                ? 'جميع الحقوق محفوظة © 2026'
                : 'Tous droits réservés © 2026' }}
        </p>

    </div>

</footer>