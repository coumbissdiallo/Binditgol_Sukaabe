@extends ('layouts.app')
@section ('content')

 <div class="declaration-agent">
  <h1 class="d-flex justify-content-center">Gestion des déclarations en attente de signature</h1>

  <div class="container mt-5 ms-2">

   <div class="text-end mb-2">
    <span class="badge text-bg-primary badge1">En attente</span>
    </div>

  <table class="table table-hover table-custom">
  <tbody>
    @forelse ($declarationsAttente as $declaration)
    <tr class="hover-zone">
      <th scope="row">{{$declaration->id}}</th>
      <td>{{$declaration->enfant->prenom_enfant ?? '-'}}</td>
      <td>{{$declaration->enfant->nom_enfant ?? '-'}}</td>
      <td>{{$declaration->enfant->date_naissance ?? '-'}}</td>
      <td>
        <div class="actions-buttons">
    <i class="bi  bi-pencil-square fs-5 text-primary me-2"></i>  
    <i class="bi  bi-eye fs-5 text-warning me-2"></i>  
    <i class="bi  bi-trash fs-5 text-danger"></i>  
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