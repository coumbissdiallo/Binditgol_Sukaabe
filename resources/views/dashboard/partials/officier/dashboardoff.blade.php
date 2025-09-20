@extends ('layouts.app')
@section ('content')
<div class="content-dashboard">

<h2 class="d-flex justify-content-center mt-4">Tableau de bord</h2>

<div class="container mt-5 ms-2">
<!--affichage des données sur carte -->
<div class="row d-flex justify-content-between" data-aos="zoom-in" data-aos="fade-up">

  <div class="col-12 col-md-6 col-lg-4 mb-3">
    <div class="card">
      <div class="card-body d-flex flex-wrap justify-content-center align-items-center">
        <div>
            <i class="bi bi-person-standing-dress fs-2"></i>
        </div>
        <div class="ms-3">
        <strong>Féminin</strong>
        <p class="text-primary">{{ $nbFilles }}</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class=" col-12 col-md-6 col-lg-4 mb-3">
     <div class="card">
      <div class="card-body d-flex flex-wrap justify-content-center align-items-center">
        <div>
            <i class="bi bi-person-standing fs-2"></i>
        </div>
        <div class="ms-3">
        <strong>Garçon</strong>
        <p class="text-primary">{{ $nbGarçons }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-4">
    <div class="card">
      <div class="card-body d-flex flex-wrap justify-content-center align-items-center">
        <div>
            <i class="bi bi-bar-chart-fill fs-2"></i>
        </div>
        <div class="ms-3">
        <strong>Total inscrit</strong>
        <p class="text-primary">{{ $nbTotal }}</p>
        </div>
      </div>
    </div>
  </div>
  

</div>     <!-- fin row -->

 <!-- tableau des maternités -->
<div class="mt-5">
    <table class="table table-hover">
    <legend class="d-flex justify-content-center">Liste des maternités de la commune de
        <strong class="text-primary ms-2">{{ Auth::user()->commune->nom_commune ?? '—' }}</strong>
    </legend>
  <thead>
    <tr>
      <th scope="col">Nom de la maternité</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($maternites as $maternite)
    <tr>
     <td>{{$maternite->nom_maternite}}</td> 
    </tr>
    @endforeach
  </tbody>
</table>
</div>


</div>

</div>
@endsection