@extends('layouts.app')
@section('content')

@php
    $declaration = $actes->declarationNaiss;

    use Carbon\Carbon;
    $heure = $declaration->enfant->accouchement->heure_naissance 
        ? Carbon::parse($declaration->enfant->accouchement->heure_naissance) 
        : null;
@endphp

<div>
    <a href="{{ route ('registres.naissances') }}"><i class="bi bi-arrow-return-left"></i></a>
</div>

<div class="contenair bg-white w-75 m-5 cadre-acte p-4">

<!-- l'en-tete -->
<div class="en-tete-acte">

    <!-- info-de l'etat -->
    <div class="flex-column">
    <h4>REPUBLIQUE DU SENEGAL</h4>
     <p>Un Peuple - Un But -Une Foi</p>
    <div class="trait-acte">
    </div>
     <h6>REGION DE {{ Auth::user()->commune->region ?? '—' }}</h6>
     <div class="trait-acte">
    </div>
    <Strong>Commune de {{$actes->commune->nom_commune ?? '—' }}</Strong>
    <div class="trait-acte">
    </div>
    <strong>{{$actes->maternite->nom_maternite ?? '—' }}</strong>
    </div>

 </div> <!-- fin en tete -->



<!-- Corps de l'acte -->
<div>

<!-- premier etape -->
<div class="premier-etape-corps">

<div class="">
    <h5 class="fw-6">EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE</h5>
    <p>Pour l'année <strong class="text-primary">{{$actes->anne_acte}}</strong></p>
    <p>Numb dans le registre <strong class="text-primary">{{$actes->numero_registre}}</strong></p>
</div>

</div>

<!-- deuxiéme etape -->
<div class="deuxieme-acte-corps">

<p>Le <strong class="text-primary">{{$declaration->enfant->date_naissance}}</strong> </p>
<p>à <strong>{{ $heure ? $heure->format('H') : '—'  }}
 </strong> heures 
 <strong>{{$heure ? $heure->format('H') : '—' }}
 minutes est né (e) à </strong>
  <strong>{{$actes->commune->nom_commune ?? '—' }} </strong>
</p>
<p>Un enfant de sexe  <strong class="text-primary">{{$declaration->enfant->sexe}}</strong></p>

<div class="d-flex">
    <strong>{{$declaration->enfant->prenom_enfant}}  {{$declaration->enfant->nom_enfant}}</strong>

</div>
<p>de  <strong class="text-primary">{{$declaration->enfant->prenom_pere}}</strong> </p>
<div class="d-flex">
<p>Et de <strong>{{$actes->prenom_mere}}</strong></p>
<strong>{{$actes->nom_mere}}</strong>
</div>
</div>

<!-- footer -->
<div class="mt-5">

<div class="d-flex">
<div class="flex-column">
    <h6 class="underline">Extrait Délivré par:</h6>
    <strong>{{$declaration->maternite->nom_maternite ?? '—' }}</strong>
</div>
<div class="flex-column">
<h6 class="underline">Pour Extrait Certifié Conforme:</h6>
 <p>Délivré à {{$actes->commune->nom_commune ?? '—' }} , le{{$actes->datesignature}}</p>
 <h5 class="underline">L'Officier d'Etat civil</h5>
 <p class="text-pink"> {{ $officier->nom ?? '—' }} {{ $officier->prenom ?? '—' }}  {{$actes->id_signatureofficier}}</p>
</div>

</div>

</div>



 </div>      <!-- fin du corps -->
   





</div>

@endsection