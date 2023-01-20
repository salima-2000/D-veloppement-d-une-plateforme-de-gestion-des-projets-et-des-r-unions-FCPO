@extends('layouts.layout')
@section('styles')
<style>
ol, ul {
	list-style: none;
}
a {
  color: #35a785;
  text-decoration: none;
}

/* -------------------------------- 

Modules - reusable parts of our design

-------------------------------- */
.img-replace {
  /* replace text with an image */
  display: inline-block;
  overflow: hidden;
  text-indent: 100%;
  color: transparent;
  white-space: nowrap;
}

/* -------------------------------- 

xnugget info 

-------------------------------- */
.cd-nugget-info {
  text-align: center;
  position: absolute;
  width: 100%;
  height: 50px;
  line-height: 50px;
  bottom: 0;
  left: 0;
}
.cd-nugget-info a {
  position: relative;
  font-size: 14px;
  color: #5e6e8d;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
.no-touch .cd-nugget-info a:hover {
  opacity: .8;
}
.cd-nugget-info span {
  vertical-align: middle;
  display: inline-block;
}
.cd-nugget-info span svg {
  display: block;
}
.cd-nugget-info .cd-nugget-info-arrow {
  fill: #5e6e8d;
}

/* -------------------------------- 

Main components 

-------------------------------- */
header {
  height: 200px;
  line-height: 200px;
  text-align: center;
  background-color: #5e6e8d;
  color: #FFF;
}
header h1 {
  font-size: 20px;
  font-size: 1.25rem;
}

.cd-popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(94, 110, 141, 0.9);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
}
.cd-popup.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}

.cd-popup-container {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: 4em auto;
  background: #FFF;
  border-radius: .25em .25em .4em .4em;
  text-align: center;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  -webkit-transform: translateY(-40px);
  -moz-transform: translateY(-40px);
  -ms-transform: translateY(-40px);
  -o-transform: translateY(-40px);
  transform: translateY(-40px);
  /* Force Hardware Acceleration in WebKit */
  -webkit-backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.cd-popup-container p {
  padding: 3em 1em;
}
.cd-popup-container .cd-buttons:after {
  content: "";
  display: table;
  clear: both;
}
.cd-popup-container .cd-buttons li {
  float: left;
  width: 50%;
  list-style: none;
}
.cd-popup-container .cd-buttons a {
  display: block;
  height: 60px;
  line-height: 60px;
  text-transform: uppercase;
  color: #FFF;
  -webkit-transition: background-color 0.2s;
  -moz-transition: background-color 0.2s;
  transition: background-color 0.2s;
}
.cd-popup-container .cd-buttons li:first-child a {
  background: #C22F2F;
  border-radius: 0 0 0 .25em;
}
.no-touch .cd-popup-container .cd-buttons li:first-child a:hover {
  background-color: #fc8982;
}
.cd-popup-container .cd-buttons li:last-child a {
  background: #b6bece;
  border-radius: 0 0 .25em 0;
}
.no-touch .cd-popup-container .cd-buttons li:last-child a:hover {
  background-color: #c5ccd8;
}
.cd-popup-container .cd-popup-close {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 30px;
  height: 30px;
}
.cd-popup-container .cd-popup-close::before, .cd-popup-container .cd-popup-close::after {
  content: '';
  position: absolute;
  top: 12px;
  width: 14px;
  height: 3px;
  background-color: #8f9cb5;
}
.cd-popup-container .cd-popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}
.cd-popup-container .cd-popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 8px;
}
.is-visible .cd-popup-container {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}
@media only screen and (min-width: 1170px) {
  .cd-popup-container {
    margin: 8em auto;
  }
}
</style>
@endsection
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

<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">
        <thead>
            <tr>
                <th>Nom du projet</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Etat</th>
                <th>Client</th>
                <th>Equipe</th>
                <?php if($role=='Developpeur'|| $role=='Admin'){?> 
                <th>Chef de projet</th> <?php }?>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projets as $projet)
         <tr>
            <td>{{ $projet->intituleProjet }}</td>
                <td><a href="{{ $projet->description }}"  download style="background-color:transparent;"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="red" class="bi bi-file-pdf" viewBox="0 0 16 16">
  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
  <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg></a></td>
                <td>{{ $projet->deadline }}</td>
                <td>
                   
                 <?php 
                 $idprojet=DB::table('projet')->where('intituleProjet', $projet->intituleProjet) 
                 ->where('client', $projet->client)
                 ->where('deadline', $projet->deadline)
                 ->where('description', $projet->description)
                 ->where('equipeID', $projet->equipeID)
                 ->value('id');
                 $taches= DB::table('tache')
                 ->where('projetID','=','idprojet')
                 ->count();
                 $tachesRealisées= DB::table('tache')
                 ->where('projetID','=',$idprojet)
                 ->where('etat','=','1')
                 ->count();
                 if($taches==0){
                   $progress=0;
                 }else{
                  $progress=$tachesRealisées/$taches*100;
                 }
                 ?>
                      <progress id="file" max="100" value="{{$progress}}"> {{$progress}} </progress>
                </td>
                <td>{{ $projet->client }}</td>
                <td>{{ $projet->equipeID }}</td>
                <?php   if($role=='Developpeur'|| $role=='Admin'){?> 
                <td>{{ $projet-> chefProjet }}</td> <?php } ?>
                <?php 
                if($role=='Admin'){?>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     Choisir
                    </button>
                
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item annuler-projet" style="cursor:pointer;" data-target="#annulerProjet"  data-toggle="modal"  data-projetid={{$idprojet}}>Annuler</a></li>
                                 <li><a style="cursor:pointer;" class="dropdown-item modifier-projet" data-target="#modifierProjet" data-toggle="modal"  data-projetid={{$idprojet}}  data-intitule="{{ $projet->intituleProjet}}"
                           data-date="{{ $projet->deadline}}" data-equipe="{{ $projet->equipeID}}"
                           data-client="{{$projet->client}}" data-chefprojet="{{$projet->chefProjet}}" 
                           data-descriptif="{{$projet->description}}">Modifier</a></li>
                            <li><a class="dropdown-item" style="cursor:pointer;" href="{{url('/Admin/projets/suivre/'.$idprojet)}}">Suivre</a></li>
    
                          </ul>
                 </div>
                </td>
                <?php }
                
                if( $role=='Chef Projet'){?> 
                
                <td>
                   <a style="cursor:pointer; background-color:transparent;" href="{{url('/ChefProjet/projets/suivre/'.$idprojet)}}" style="background-color:transparent; color:#037CC2; text-decoration:underline; font-weight:bold;">Suivre</a>
                </td>
                <?php }
                if( $role=='Developpeur'){?> 
                
                <td>
                   <a style="cursor:pointer; background-color:transparent;" href="{{url('/Developpeur/projets/suivre/'.$idprojet)}}" style="background-color:transparent; color:#037CC2; text-decoration:underline; font-weight:bold;">Suivre</a>
                </td>
                <?php } ?>  
           </tr>
           @endforeach
          </tbody>
    </table>
</div>
<?php 
if($role=='Admin'){?>
<div style="padding-left:25%">
<button class="bton" data-toggle="modal" data-target="#creerProjet" type="button">Creer Projet</button>
</div>
<?php } ?>
<div   class="modal fade" id="creerProjet" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Creer Projet</h3>
         
          <form action="{{ route('ajouterProjet')}}" method="post">
          @csrf
            <div class="form-group">
              <label for="">Intitulé</label>
              <input type="name" class="form-control" name="intitule" placeholder="Saisissez l'intitulé du projet">
              <span style="color:red"> @error('intitule') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for=""> Deadline</label>
              <input type="Date" class="form-control" name="deadline"  placeholder="">
              <span style="color:red"> @error('deadline') {{$message}} @enderror</span>
              <label for="">Equipe</label>
              <select type="select" class="form-control" id="" name="equipe">

              @foreach($equipes as $equipe)
                  <option>{{$equipe->id}}</option>
              @endforeach  
              </select>
              <span style="color:red"> @error('equipe') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3"  class="form-group">
              <label for="">Client</label>
              <input type="text" class="form-control" name="client" placeholder=" le nom du client">
              <span style="color:red"> @error('client') {{$message}} @enderror</span>
              <label for="">Chef de Projet</label>
              <select type="select" class="form-control"  name="chefProjet">
              @foreach($chefsEquipe as $chefEquipe)
                  <option>{{$chefEquipe->name}}</option>
              @endforeach 
    
              </select>
              <span style="color:red"> @error('chefProjet') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Descriptif</label>
              <input type="file" class="form-control" name="descriptif" placeholder="descriptif">
        
              <span style="color:red"> @error('descriptif') {{$message}} @enderror</span>
            </div>
            <div class="modal-footer">
        <button  class="btonModal" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button  type="submit" class="btnModal">Enregistrer</button>
      </div>
   </form>
  </div>
</div>
</div>
</div>
</div>
 <!-- Modal d'annulation -->
  <div class="modal fade" id="annulerProjet" tabindex="-1" aria-labelledby="annulerProjetLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:30px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
   
     <form action="{{route('annulerProjet')}}" method="post" enctype="multipart/form-data">
       {{method_field('delete') }}
        {{ csrf_field() }}
        
        <div class="modal-header">
        <h4  style="padding-left:230px; color:#46768B;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight:bolder;" class="modal-title" id="annulerReunionLabel">{{ __('Annuler Projet') }}</h4>
        <button  type="button" class="close" data-dismiss="modal"> X </button>
     </div>
    
     
      <div class="modal-body">
      <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:150px; padding-top:10px;" > Vous etes sur de vouloir annuler ce projet?</p>
      <input type="hidden" name="projetid" id="projetid" value="" >
      </div>
      <div class="modal-footer">
        <button style="border-radius:20px; width:150px; position:relative;right:250px;" type="button close" class="btn btn-secondary" data-dismiss="modal">NON</button>
        <button  style="border-radius:20px;position:relative;right:40px; width:150px;" type="submit" class="btn btn-danger">{{ __('OUI')}}</button>
      </div>
      </form>
      </div>
</div>
</div>

      <!--  Modal de modification-->
<div   class="modal fade" id="modifierProjet" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Modifier Projet</h3>
          
          <form action="{{ route('modifierProjet')}}" method="post">
          <input type="hidden" name="projetid" id="projetid" value="" >
          @csrf
          <div class="form-group">
              <label for="">Intitulé</label>
              <input type="name" class="form-control" id="intitule" name="intitule" >
              <span style="color:red"> @error('intitule') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for=""> Deadline</label>
              <input type="Date" class="form-control" id="deadline" name="deadline" >
              <span style="color:red"> @error('deadline') {{$message}} @enderror</span>
              <label for="">Equipe</label>
              <select type="select" class="form-control" id="equipe" name="equipe">
              @foreach($equipes as $equipe)
                  <option>{{$equipe->id}}</option>
              @endforeach  
              </select>
              <span style="color:red"> @error('equipe') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3"  class="form-group">
              <label for="">Client</label>
              <input type="text" class="form-control" id="client" name="client" >
              <span style="color:red"> @error('client') {{$message}} @enderror</span>
              <label for="">Chef de Projet</label>
              <select type="select" class="form-control" id="chefProjet" name="chefProjet">
              @foreach($chefsEquipe as $chefEquipe)
                  <option>{{$chefEquipe->name}}</option>
              @endforeach 
    
              </select>
              <span style="color:red"> @error('chefProjet') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Descriptif</label>
              <input type="file" class="form-control" id="descriptif" name="descriptif" value="" >
        
              <span style="color:red"> @error('descriptif') {{$message}} @enderror</span>
            </div>
           
            <div class="modal-footer">
        <button  class="btonModal" data-bs-dismiss="modal" >Annuler</button>
        <button  type="submit" class="btnModal">Enregistrer</button>
      </div>
      </form>
      </div>
</div>
</div>
</div>
</div>
   
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
