@extends ('layouts.app')
@section ('content')
<div>
<h2 class="d-flex justify-content-center">Tous les actes de naissances</h2>
<div class="container mt-5 ms-2">

<div class="container-fluid">
    <form class="row g-2 align-items-center mb-4" role="search">
    <div class="col-md-4">
      <input class="form-control me-2" type="text" placeholder="Rechercher par nom,prenom ou numéro" aria-label="text"/>
    </div>  
    <div class="col-md-4 ms-1">
      <input class="form-control me-2" type="date" placeholder="Rechercher avec la date de naissance" aria-label="date"/>
      </div>

      <div class="col-md-3 ms-2">
            <button class="btn btn-search" type="submit">Rechercher</button>
      </div>
    </form>
  </div>

  <!-- tableau des registres de naissance -->
  <div class="d-flex justify-content border rounded p-3">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Numéro_registre</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Action</th>

      
    </tr>
  </thead>
  <tbody>
    @forelse ($actes as $acte)
    <tr>
      <th scope="row" class="text-primary">{{$acte->numero_registre}}</th>
      <td>{{ $acte->enfant->prenom_enfant ?? '-' }}</td>
      <td>{{ $acte->enfant->nom_enfant ?? '-' }}</td>
      <td>{{ $acte->enfant->date_naissance ?? '-' }}</td>
        <td>
        <a href="{{ route ('actes.show' , $acte->id) }}" class="btn btn-warning"><i class="bi  bi-eye-fill fs-5"></i></a>  
        </td>
    </tr>
    @empty
    <tr>
  <td colspan="5" class="text-center text-muted">Aucun acte enregistré.</td>
</tr>
    @endforelse
  </tbody>
</table>
  </div>

</div>
</div>

@endsection