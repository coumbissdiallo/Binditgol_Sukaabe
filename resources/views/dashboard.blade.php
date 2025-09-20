@extends('layouts.app')
@section('content')

<!-- injection des fichiers spécifiques pour chaque role  -->

@if(Auth::user()->hasRole('parent'))
        @include('dashboard.partials.parent.liste-enregistrements')
    @elseif(Auth::user()->hasRole('officier'))
        @include('dashboard.partials.officier.dashboardoff')
    @elseif(Auth::user()->hasRole('asc'))
        @include('dashboard.partials.parent.liste-enregistrements')
    @elseif(Auth::user()->hasRole('agent'))
        @include('dashboard.partials.agent.declaration-pro')
    @elseif(Auth::user()->hasRole('maternite'))
        @include('dashboard.partials.maternite.index')
    @else
        <p class="text-red-500">Rôle inconnu</p>
    @endif

@endsection