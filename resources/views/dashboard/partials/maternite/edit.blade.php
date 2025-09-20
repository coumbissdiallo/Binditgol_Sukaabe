@extends('layouts.app')
@section('content')

<h2 class="text-center">Formulaire de modification</h2>
<div class="form-accouchement border rounded p-5 mt-5 w-75">
<form action="{{route ('maternite.liste.update' , $accouchement->id)}}" method="POST">
  @csrf
  @method('put')
    <div class="row g-3">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-mere" name="nom_mere" required value="{{$accouchement->nom_mere}}">
      <label for="nom-mere">Nom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-mere" name="prenom_mere" required  value="{{$accouchement->prenom_mere}}">
      <label for="p-mere">Prénom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-mere" name="cni_mere" required value="{{$accouchement->cni_mere}}">
      <label for="cni-mere">CNI</label>
  </div>
</div>
  <!-- champs pére -->
  <div class="row g-3 mt-2">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-pere" name="nom_pere" value="{{$accouchement->nom_pere}}">
      <label for="nom-pere">Nom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-pere" name="prenom_pere" value="{{$accouchement->prenom_pere}}">
      <label for="p-pere">Prénom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-pere" name="cni_pere" value="{{$accouchement->cni_pere}}">
      <label for="cni-pere">CNI</label>
  </div>
</div>

<!-- champs date -->
<div class="row g-3 mt-2">
  <div class="col">
<label for="exampleInputdate" class="form-label">Date accouchement</label>
    <input type="date" class="form-control" id="exampleInputdate" name="date_naissance" required  value="{{$accouchement->date_naissance}}" >
  </div>
  <div class="col">
<label for="exampleInputheure" class="form-label">heure accouchement</label>
    <input type="time" step="1" class="form-control" id="exampleInputheure" name="heure_naissance" required value="{{$accouchement->heure_naissance}}">
  </div>
</div>
<button type="submit" class="btn btn-outline-primary mt-2">Enregistrer</button>
</form>

</div>




@endsection