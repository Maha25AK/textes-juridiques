<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background:#0F4C81;">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Portail des Textes Juridiques
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                       href="{{ route('categories.index') }}">
                        <i class="bi bi-folder"></i> Catégories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('domaines.*') ? 'active' : '' }}"
                       href="{{ route('domaines.index') }}">
                        <i class="bi bi-diagram-3"></i> Domaines
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('textes.*') ? 'active' : '' }}"
                       href="{{ route('textes.index') }}">
                        <i class="bi bi-file-earmark-text"></i> Textes juridiques
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav align-items-center">

                <li class="nav-item me-3 text-white">
                    <i class="bi bi-person-circle"></i>
                    {{ Auth::user()->name }}
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="btn btn-outline-light btn-sm">
                            <i class="bi bi-box-arrow-right"></i>
                            Déconnexion
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav>