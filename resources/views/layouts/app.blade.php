<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/interfaceUsers.css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <title>Binditgol Sukaabe</title>

        
    </head>
    <body>
@auth
    @if(Auth::user()->hasRole('parent'))
        @include('profile.partials.sidebar-parent')
    @elseif(Auth::user()->hasRole('officier'))
        @include('profile.partials.sidebar-officier')
    @elseif(Auth::user()->hasRole('asc'))
        @include('profile.partials.sidebar-parent')
    @elseif(Auth::user()->hasRole('agent'))
        @include('profile.partials.sidebar-agent')
    @elseif(Auth::user()->hasRole('maternite'))
        @include('profile.partials.sidebar-maternite')
    @else
        <p class="text-red-500">Rôle inconnu</p>
    @endif
@endauth


    <main class="main-content"> 
        <div class="contenu mt-2 mb-3">
            @yield('content')
        </div>
    </main>

            <!-- scripts -->
    @vite(['resources/js/app.js'])
   
</body>
</html>
