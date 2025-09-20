@extends('layouts.app')
@section('content')

<div class="content-parent">
<h2 class="d-flex justify-content-center mt-3">Tous mes enregistrements</h2>

<div class="d-flex justify-content border listeparent rounded p-3 mt-5">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Numéro</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Statut</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($declarations as $declaration)
    <tr>
      <th scope="row">{{$declaration->enfant->id}}</th>
      <td>{{$declaration->enfant->prenom_enfant}}</td>
      <td>{{$declaration->enfant->nom_enfant}}</td>
      <td>{{$declaration->enfant->date_naissance}}</td>
      <td> 
      
        <a href="{{ route ('actes.show' , $declaration->acteNaissance->id) }}">  <span class="badge text-bg-primary badge1"> {{$declaration->statut}}</span></a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="5" class="text-center text-muted">Aucun Enregistrement.</td>
    </tr>
    @endforelse
  </tbody>
</table>
  </div>

</div>
</div>

@endsection