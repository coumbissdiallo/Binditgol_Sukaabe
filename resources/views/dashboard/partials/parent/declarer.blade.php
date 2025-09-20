@extends ('layouts.app')
@section ('content')
<div class="content-parent2">

<div class="container">
<img src="{{asset('/images/img-maternite.jpg')}}" class="w-100 img-maternite" alt="">
</div>

<div class="m-4">
<h2>Faire une déclaration</h2>
<small>Veuillez fournir ces informations avant de pouvoir faire une déclaration svp   !!!</small>
 
<form action="{{ route ('parent.verification.identite') }}" method="Post">
  @csrf
<div class="row g-3 mt-3">

  <!-- selection commune -->
 <div class="col">
    <label for="commune" class="form-label">Selectionner la commune</label>
<select class="form-select" name="id_commune" aria-label="Default select example" id="commune" required>
  <option disabled selected>Choisir</option>
    @foreach ($communes as $commune)
  <option value="{{$commune->id}}">
{{$commune->nom_commune}}
  </option>
  @endforeach
</select>
 </div>

  <!-- selection maternite-->
   <div class="col">
    <label for="maternite" class="form-label">Le nom de la maternité</label>
<select class="form-select"  aria-label="Default select example" id="maternite" name="id_maternite" required>
  <option disabled selected>Choisir une maternité</option>
    </select>
    </div>

 </div> <!--fin row -->

 <div class="row g-3 mt-2">
  <div class="col">
    <input type="name" class="form-control" placeholder="Prenom" aria-label="Prenom" id="Prenom" name="prenom_mere" required>
  </div>
  <div class="col">
    <input type="name" class="form-control" placeholder="Nom" aria-label="Nom" id="nom" name="nom_mere" required>
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Numéro CNI" aria-label="Numéro CNI" id="cni"  name="cni_mere" required>
  </div>
</div>
<div class="d-flex justify-content-end mt-3">
    <input class="btn btn-primary" type="submit" value="Vérifier">
    
</div>
</div> 
</div>
</form>
@endsection