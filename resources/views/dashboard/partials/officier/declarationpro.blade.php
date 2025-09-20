@extends ('layouts.app')
@section ('content')

 <div class="declaration-officier">
  <h1 class="d-flex justify-content-center">Gestion des déclarations en attente de signature</h1>

  <div class="container mt-5 ms-2">

   <div class="text-end mb-2">
    <span class="badge text-bg-primary badge1">en attente </span>
    </div>

  <table class="table table-hover table-custom">
  <thead>
  </thead>
  <tbody>
    @forelse ($declarationsAttente as $declaration)
    <tr class="hover-zone">
      <th scope="row">{{$declaration->id}}</th>
      <td>{{$declaration->enfant->prenom_enfant ?? '-'}}</td>
      <td>{{$declaration->enfant->nom_enfant ?? '-'}}</td>
      <td>{{$declaration->enfant->date_naissance ?? '-'}}</td>
      <td>
        <div class="actions-buttons">  
    <form action="{{ route('declaration.valider', $declaration->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-info ms-3"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        Signature
    </button>
</form>
        
    </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="5" class="text-center text-muted">Aucune déclaration en attente.</td>
    </tr>
    @endforelse
  </tbody>
</table>
 
  </div>
 </div>

 @endsection