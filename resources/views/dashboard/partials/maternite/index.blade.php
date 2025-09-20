 @extends ('layouts.app')
  @section ('content')
  
  <div> 
    <h2 class="d-flex justify-content-center">La liste de tous les enregistrements</h2> 
    <div class="container mt-5 ms-2">
        
    <div class="container-fluid border-none shadow-none">
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
    <div class="table-responsive d-flex justify-content border rounded p-3">
         <table class="table table-hover"> 
            <thead> 
                <tr>
                     <th scope="col">Numéro</th> 
                     <th scope="col">Prénom</th> 
                     <th scope="col">Nom</th> 
                     <th scope="col">CNI</th> 
                     <th scope="col">Date accouchement</th>
                      <th scope="col">Action</th>
                </tr>
            </thead> 
            <tbody>
                 @foreach ($affichageliste as $liste)
                  <tr> <th scope="row">{{$liste->id}}</th>
                   <td>{{$liste->prenom_mere}}</td> 
                   <td>{{$liste->nom_mere}}</td> 
                   <td>{{$liste->cni_mere}}</td> 
                   <td>{{$liste->date_naissance}}</td>
                    <td>
                         <button class="btn btn-warning btn-sm" onclick="showDetails({{ $liste->id}})"> <i class="bi bi-eye fs-6 mb-1"></i> </button> 
                         <a href="{{route ('maternite.liste.edit' , $liste->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square fs-6 mb-1"></i></a> 
                        </td>
                        </tr>
                         @endforeach 
                         
                         <!-- affichage du modal --> 
                         <div class="modal fade" id="detailsModal" aria-hidden="true" aria-labelledby="detailsModalLabel" tabindex="-1">
                             <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content"> 
                                    <div class="modal-header">
                                         <h5 class="modal-title fs-5" id="detailsModalLabel"> Détails de l'enregistrement </h5> 
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                                        </div> 
                                        
                                       <div class="modal-body"id="detailsModalBody"> 
        
                                        </div>
                                     </div> 
                                    </div> 
                                </div> 
                            </tbody>
                         </table>
                         </div>
                         </div> 
                        </div>
@endsection
