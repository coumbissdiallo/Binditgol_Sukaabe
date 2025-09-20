<div class="sidebar">
    <!-- Logo + bouton + btn-deconnexion-->
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
                    <div class="les-icones"><i class="bi bi-journals fs-2"></i></div>
                    <a class="nav-link" href="{{ route ('officier.tableau-bord') }}">Tableau de Bord</a>
                </li>
            </ul>
        </div>

        <div class="contour">
            <ul class="nav">
                <li class="nav-item d-flex align-items-center gap-2">
                    <div class="les-icones"><i class="bi bi-file-bar-graph fs-2"></i></div>
                    <a class="nav-link" href="{{ route('officier.declaration-provisoire') }}">Déclarations Provisoires</a>
                </li>
            </ul>
        </div>

        <hr class="mt-5">

        <div class="contour">
            <ul class="nav">
                <li class="nav-item d-flex align-items-center gap-2">
                    <div class="les-icones"><i class="bi bi-journal-check fs-2"></i></div>
                    <a class="nav-link" href="{{ route('registres.naissances') }}">Régistres</a>
                </li>
            </ul>
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
