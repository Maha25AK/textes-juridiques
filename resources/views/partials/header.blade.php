<header class="bg-white shadow-sm custom-header">

    <div class="container py-3">

        <!-- Langues -->
        <div class="text-end">
            <a href="{{ route('lang.switch', 'fr') }}" class="text-decoration-none text-dark fw-semibold">FR</a>
            <span class="mx-2">|</span>
            <a href="{{ route('lang.switch', 'ar') }}" class="text-decoration-none text-dark fw-semibold">AR</a>
        </div>

        <!-- Logo -->
        <div class="text-center my-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}"
                     alt="Logo Ministère"
                     style="max-height:100px;">
            </a>
        </div>

        <!-- Menu -->
        <nav class="mt-4">
            <ul class="nav justify-content-center">

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('categorie.show', 1) }}">
                        Lois
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('categorie.show', 2) }}">
                        Décrets
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('categorie.show', 3) }}">
                        Arrêtés
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('categorie.show', 4) }}">
                        Circulaires
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</header>