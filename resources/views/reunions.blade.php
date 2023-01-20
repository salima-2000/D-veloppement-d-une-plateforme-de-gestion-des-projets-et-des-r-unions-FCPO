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
<button type="button" class="close" data-dismiss="alert">X</button>
  {{Session::get('fail')}}
</div>
@endif
<?php 

 $reunions=DB::table('reunion')->select('objetReunion', 'dateReunion','heureReunion','client','contactClient')
                               ->where('dateReunion','>',date("Y-m-d"))->get();
  ?>
<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">
        <thead>
            <tr>
                <th>Objet de réunion</th>
                <th>date de réunion</th>
                <th>Heure</th>
                <th>Client</th>
                <th>Contact Client</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
               @foreach($reunions as $reunion)
               <tr>
                <td>{{ $reunion->objetReunion }}</td>
                <td>{{ $reunion->dateReunion }}</td>
                <td>{{ $reunion->heureReunion }}</td>
                <td>{{ $reunion->client }}</td>
                <td>{{ $reunion->contactClient }}</td>
                <td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Choisir
  </button>
  <?php $id=DB::table('reunion')->where('objetReunion', $reunion->objetReunion) 
                               ->where('dateReunion', $reunion->dateReunion)
                               ->where('heureReunion', $reunion->heureReunion)
                               ->where('client', $reunion->client)
                               ->value('idReunion');


  ?>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a style="cursor:pointer;" class="dropdown-item open-annuler" data-toggle="modal"  data-reunionid={{$id}} >Annuler </a></li>
    <li><a style="cursor:pointer;" class="dropdown-item open-modifier" data-toggle="modal" data-target="#modifierReunion"  data-reunionid={{$id}} data-objet="{{ $reunion->objetReunion}}"
    data-date="{{ $reunion->dateReunion}}" data-heure="{{ $reunion->heureReunion}}"
    data-client="{{$reunion->client}}" data-contact="{{$reunion->contactClient}}">Modifier</a></li>
  
  </ul>
</div></td>
            </tr>
            @endforeach
           
        </tbody>
      
    </table>
</div>
   
<div style="padding-left:25%">
<button  class="bton" data-toggle="modal" data-target="#programmerReunion"> Programmer une réunion</button>
</div>

<div   class="modal fade" id="programmerReunion" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Programmer Réunion</h3>
          
          <form action="{{ route('ajouterReunion')}}" method="post">
          
          @csrf
            <div class="form-group">
              <label for="">Objet</label>
              <input type="name" class="form-control" name="objet" placeholder="Saisissez l'objet de la réunion">
              <span style="color:red"> @error('objet') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for=""> Date</label>
              <input type="Date" class="form-control" name="date"  pdlaceholder="Date de la réunion">
              <span style="color:red"> @error('date') {{$message}} @enderror</span>
              <label for="">Heure</label>
              <input type="time" class="form-control" name="heure" placeholder="">
              <span style="color:red"> @error('date') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Client</label>
              <input type="text" class="form-control" name="client" placeholder="Saisissez le nom de client">
              <span style="color:red"> @error('client') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Contact Client</label>
              <input type="tel" class="form-control" name="tel" placeholder="Saisissez le contact du client">
              <span style="color:red"> @error('tel') {{$message}} @enderror</span>
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
   <!--     Modal d'annulation -->
   <div class="modal fade" id="annulerReunion" tabindex="-1" aria-labelledby="annulerReunionLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:30px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
     <form action="{{route('annulerReunion')}}" method="post" enctype="multipart/form-data">
       {{method_field('delete') }}
        {{ csrf_field() }}
      <div class="modal-header">
        <h4  style="padding-left:230px; color:#46768B;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight:bolder;" class="modal-title" id="annulerReunionLabel">{{ __('Annuler Réunion') }}</h4>
        <button class="close" data-bs-dismiss="modal"> X </button>
      </div>
    
     
      <div class="modal-body" >
       <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:150px; padding-top:10px;" > Vous voulez vraiment annuler cette réunion? </p>
      
      
      <input type="hidden" name="reunionid" id="reunionid" value="" >
      </div>
      <div class="modal-footer">
        <button style="border-radius:20px; width:150px; position:relative;right:250px;" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button style="border-radius:20px;position:relative;right:40px; width:150px;" type="submit" class="btn btn-danger">{{ __('Oui')}}</button>
      </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</div>
 
 
  <!--modal modification --> 
  <div   class="modal fade" id="modifierReunion" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Modifier Réunion</h3>
          
          <form action="{{ route('modifierReunion')}}" method="post">
          <input type="hidden" name="reunionid" id="reunionid" value="" >
          @csrf
          
            <div class="form-group">
              <label for="">Objet</label>
              <input type="name" class="form-control" id="objet" name="objet" value="" >
              <span style="color:red"> @error('objet') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for=""> Date</label>
              <input type="Date" class="form-control" id="date" name="date"  value="" >
              <span style="color:red"> @error('date') {{$message}} @enderror</span>
              <label for="">Heure</label>
              <input type="time" class="form-control" name="heure" id="heure" value="">
              <span style="color:red"> @error('date') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Client</label>
              <input type="text" class="form-control" name="client" id="client" value="" >
              <span style="color:red"> @error('client') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Contact Client</label>
              <input type="text" class="form-control" name="contact" id="contact"  value="">
              <span style="color:red"> @error('tel') {{$message}} @enderror</span>
            </div>
            <div class="modal-footer">
        <button  class="btonModal" type="reset" class="btn btn-secondary" data-bs-dismiss="modal"  value="">Annuler</button>
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




