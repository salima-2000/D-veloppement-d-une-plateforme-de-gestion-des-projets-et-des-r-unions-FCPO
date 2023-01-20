@extends('layouts.layout')

@section('content')
@if(Session::get('success'))

<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
  {{Session::get('success')}}
</div>
@endif
@if(Session::get('fail'))
<div class="alert alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
  {{Session::get('fail')}}
</div>
@endif
<h3 style="position:relative; left:400px; top:35px;font-weight:bolder; color:#46768B ;font-family:Georgia, 'Times New Roman', Times, serif;">{{$intitule}} </h3>
<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">
        <thead>
            <tr>
                <th>Tache</th>
                <th>Responsable</th>
                <th>Etat</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($taches as $tache)
            <tr>
                <td>{{$tache->intituleTache}}</td>
                <td>{{$responsable->name}}</td>
                <td>@if($tache->etat==0)
                  "Non realisée"
                  @endif
                  @if($tache->etat==1)
                  "Realisée"
                  @endif
                </td>
                <?php $id=DB::table('tache')->where('intituleTache', $tache->intituleTache) 
                               ->where('devId', $tache->devId)
                               ->where('etat', $tache->etat)

                               ->value('id');


  ?>            <td>
  <button class="btn btn-secondary annuler-tache" type="button"  aria-expanded="false"  style="cursor:pointer;" data-target="#annulerTache"  data-toggle="modal"  data-tacheid={{$id}}>
  Annuler
  </button>

</td>
            </tr>
          @endforeach
        </tbody>
      
    </table>
</div>

<div style="padding-left:25%">
<button  class="bton" data-toggle="modal" data-target="#AjouterTache"> Ajouter Tache</button>
</div>

<div   class="modal fade" id="AjouterTache" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button"  class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Ajouter tache</h3>
          
          <form method="post" action="{{route('ajouterTache')}}">
            @csrf
            <input type="hidden" name="projetID" value="{{$id }}">
            <div class="form-group">
              <label for="">Nom de tache</label>
              <input type="name" class="form-control" name="nomTache" placeholder="Saisissez le nom de la tache">
              <span style="color:red"> @error('nomTache') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for=""> Responsable</label>
 
              <select type="select" class="form-control"  name="responsable"  placeholder="Saisissez le nom du responsable">

              @foreach($developpeurs as $developpeur)
             <option>{{$developpeur->name}}</option>
              @endforeach  
             </select>
              <span style="color:red"> @error('responsable') {{$message}} @enderror</span>
            </div>
          
            <div class="modal-footer">
        <button  class="btonModal" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button  type="submit" class="btnModal">Enregistrer</button>
      </div>
          </form>
        </div>
        </div></div></div></div>
<!-- Modal d'annulation -->
<div class="modal fade" id="annulerTache" tabindex="-1" aria-labelledby="annulerTacheLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:30px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
     <form action="{{route('annulerTache')}}" method="post" enctype="multipart/form-data">
       {{method_field('delete') }}
        {{ csrf_field() }}
      <div class="modal-header">
      <h4  style="padding-left:230px; color:#46768B;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight:bolder;" class="modal-title" id="annulerReunionLabel">{{ __('Annuler Tache') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> X </button>
      </div>
    
     
      <div class="modal-body">
      <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:150px; padding-top:10px;" > Vous etes sur de vouloir annuler cette tache?</p>
      
      
      <input type="hidden" name="tacheid" id="tacheid" value="" >
      </div>
      <div class="modal-footer">
        <button  style="border-radius:20px; width:150px; position:relative;right:250px;" type="close" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
        <button style="border-radius:20px;position:relative;right:40px; width:150px;"  type="submit" class="btn btn-danger">{{ __('OUI')}}</button>
      </div>
      </form>
    </div></div></div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable(
        { 
            "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },
            searching:false
        }
    );
} );
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


@parent
@endsection