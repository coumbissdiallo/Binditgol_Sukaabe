@extends ('layouts.app')
@section ('content')


<div class="content-parent">

<h2 class="d-flex justify-content-center pt-2">Nouvelle déclaration</h2>
<div class="form-accouchement border rounded p-5 mt-4 w-75">
<form action="{{ route('parent.declaration.store') }}" method="POST">
  @csrf
        <input type="hidden" name="id_accouchement" value="{{ $accouchement->id }}">
    
       <!-- champs mére -->
<div class="row g-3">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-mere" name="nom_mere" value="{{ $accouchement->nom_mere }}" readonly>
      <label for="nom-mere">Nom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-mere" name="prenom_mere" value="{{ $accouchement->prenom_mere }}" readonly>
      <label for="p-mere">Prénom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-mere" name="cni_mere" value="{{ $accouchement->cni_mere }}" readonly>
      <label for="cni-mere">CNI</label>
  </div>
</div>

  <!-- champs pére -->
  <div class="row g-3 mt-2">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-pere" name="nom_pere" value="{{ $accouchement->nom_pere }}" readonly>
      <label for="nom-pere">Nom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-pere" name="prenom_pere" value="{{ $accouchement->prenom_pere }}" readonly>
      <label for="p-pere">Prénom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-pere" name="cni_pere" value="{{ $accouchement->cni_pere }}" readonly>
      <label for="cni-pere">CNI</label>
  </div>
</div>

<!-- champs date -->
<div class="row g-3 mt-2">
  <div class="col">
<label for="exampleInputdate" class="form-label">Date accouchement</label>
    <input type="date" class="form-control" id="exampleInputdate" name="date_naissance" value="{{ $accouchement->date_naissance }}" readonly>
  </div>
  <div class="col">
<label for="exampleInputheure" class="form-label">heure accouchement</label>
    <input type="time" step="1" class="form-control" id="exampleInputheure" name="heure_naissance" value="{{ $accouchement->heure_naissance }}">
  </div>
</div>

<!-- champs sexe et nom du bébé -->
<div class="row g-3 mt-2">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-enfant" name="nom_enfant" value="{{ old ('nom_enfant') }}" required>
      <label for="nom-enfant">Nom du bébé</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-enfant" name="prenom_enfant" value="{{ old ('prenom_enfant') }}" required>
      <label for="p-enfant">Prénom du bébé</label>
  </div>
  <div class="col form-floating">
    <select class="form-select" name="sexe" required>
  <option disabled selected>Choisir le sexe</option>
  <option value="masculin">Masculin</option>
  <option value="feminin">Féminin</option>
</select>

  </div>
</div>
 

<button type="submit" class="btn btn-outline-primary mt-3">Enregistrer</button>
</form>

<p class="mt-3 text-dark">
NB: Veuillez remplir svp  le nom et prénom du bébé   et son sexe , les autres informations sont non modifiable pour plus de sécurité .
 <mark>Longue vie au bébé !!!</mark>
</p>
</div>

</div>


@endsection