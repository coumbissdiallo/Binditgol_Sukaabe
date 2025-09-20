<div class="sidebar">
    <!-- Logo + bouton + btn-deconnexion -->
    <div class="logomenu d-flex justify-content-between align-items-center">
        <img src="{{ asset('images/logo.png') }}" class="img-logo" alt="logo Bindigol_sukaabe">
        <div class="iconmenu"><i class="bi bi-window-sidebar fs-5" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom"></i></div>

        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 <i class="bi bi-box-arrow-right fs-5" title="Déconnexion"></i>
                            </x-dropdown-link>
                        </form>

    </div>

    <!-- Menu principal -->
    <nav class="menu">
        <div class="contour">
            <ul class="nav">
                <li class="nav-item d-flex align-items-center gap-2">
                    <div class="les-icones"><i class="bi bi-folder2 fs-2"></i></div>
                    <a class="nav-link" href="{{ route('maternite.liste.index') }}">Liste des accouchements</a>
                </li>
            </ul>
        </div>

        <hr class="mt-5">

        <div class="mt-4">
            <a href="{{ route ('maternite.enregistrements.form') }}" class="btn btn-outline-primary">Enregistrer un accouchement</a>
        </div>
        
    </nav>

    <!-- Paramètres en bas -->
    <div class="contour">
        <ul class="nav">
            <li class="nav-item d-flex align-items-center gap-2">
                <div class="les-icones"><i class="bi bi-gear fs-4"></i></div>
                <a class="nav-link" href="{{ route('profile.edit') }}">Paramètres</a>
            </li>
        </ul>
    </div>
</div>
