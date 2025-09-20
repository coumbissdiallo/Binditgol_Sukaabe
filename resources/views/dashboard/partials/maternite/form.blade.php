@extends ('layouts.app')
@section ('content')
<div class="content-maternite">

<div class="container">
<img src="{{asset('/images/img-maternite.jpg')}}" class="w-100 img-maternite" alt="">
</div>
<h2 class="d-flex justify-content-center pt-2">Nouveau enregistrement</h2>
<div class="form-accouchement border rounded p-3 mt-4 w-75">
<form action="{{route ('maternite.form.store') }}" method="POST">
  @csrf
    <div class="row g-3">
      <input type="hidden" name="id_commune" value="{{ Auth::user()->id_commune }}">
      <input type="hidden" name="id_maternite" value="{{ Auth::user()->id_maternite }}">

  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-mere" name="nom_mere" required>
      <label for="nom-mere">Nom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-mere" name="prenom_mere" required>
      <label for="p-mere">Prénom-mére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-mere" name="cni_mere" required>
      <label for="cni-mere">CNI</label>
  </div>
</div>
  <!-- champs pére -->
  <div class="row g-3 mt-2">
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="nom-pere" name="nom_pere">
      <label for="nom-pere">Nom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="name" class="form-control" placeholder="name" id="p-pere" name="prenom_pere">
      <label for="p-pere">Prénom-pére</label>
  </div>
  <div class="col form-floating">
    <input type="text" class="form-control" placeholder="text" id="cni-pere" name="cni_pere">
      <label for="cni-pere">CNI</label>
  </div>
</div>

<!-- champs date -->
<div class="row g-3 mt-2">
  <div class="col">
<label for="exampleInputdate" class="form-label">Date accouchement</label>
    <input type="date" class="form-control" id="exampleInputdate" name="date_naissance" required>
  </div>
  <div class="col">
<label for="exampleInputheure" class="form-label">heure accouchement</label>
    <input type="time" step="1" class="form-control" id="exampleInputheure" name="heure_naissance" required>
  </div>
</div>
<button type="submit" class="btn btn-outline-primary mt-2">Enregistrer</button>
</form>

</div>

</div>



@endsection