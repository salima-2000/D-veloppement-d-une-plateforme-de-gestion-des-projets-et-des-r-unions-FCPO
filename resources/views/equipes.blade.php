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
<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">

        <thead>
      <?php $i=0 ?>
            <tr>
                <th>Equipe</th>
                <th>Spécialité</th>
                <th>Membres</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($equipes as $equipe)
        <?php  $i=$i+1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $equipe ->specialite }}</td>
                <?php $membres=DB::table('users')
                   ->join('user', 'users.id', '=', 'user.userID')
                   -> where('user.equipeID','=', $equipe ->id )
                   ->distinct('name','profilImage')->get(); ?>
                   <td>
                  <article class="leaderboard">
                      <main class="leaderboard__profiles">
                @foreach($membres as $membre)    
                 <a style="cursor:pointer; background-color:transparent ; text-decoration:none;" href="{{url('/Admin/equipes/profilMembre/'.$membre-> id)}}"><article style="height:50px;" class="leaderboard__profile">
                        <img src="{{ $membre-> profilImage}}" alt="" class="leaderboard__picture">
                           <span class="leaderboard__name">{{ $membre-> name}}</span> 
                       </article>
                  </a>
                @endforeach
                </main>
                    
                </td>
                <td>
                <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Choisir
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  <li><a style="cursor:pointer;" class="dropdown-item open-supprimer" data-toggle="modal" data-target="#supprimerEquipe" data-equipeid="{{ $equipe ->id }}">Supprimer </a></li>
  <li><a style="cursor:pointer;" class="dropdown-item modifier-equipe" data-toggle="modal" data-target="#modifierEquipe" data-equipeid="{{ $equipe ->id }}">Modifier</a></li>
  </ul>
</div>
</td>
            </tr>
          @endforeach
           
        </tbody>
      
    </table>
</div>
<div style="padding-left:25%">
<button  class="bton" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Ajouter
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><button class="dropdown-item" data-toggle="modal"  data-target="#ajouterEquipe" >Equipe</button></li>
    <li><button class="dropdown-item" data-toggle="modal"  data-target="#ajouterMembre">Membre</button></li>
    
  </ul>
</div>
<!--Modal d'ajout de membre -->
<div   class="modal fade" id="ajouterMembre" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Ajouter Membre</h3>
          <form action="{{ route('ajouterMembre')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nom Complet</label>
              <input id="name" name="name" type="name" class="form-control">
              <span style="color:red"> @error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" class="form-control">
              <span style="color:red"> @error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="specialite">Spécialité</label>
              <input id="specialite" name="specialite" type="text" class="form-control">
              <span style="color:red"> @error('specialite') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3">
              <label for="equipe">Equipe</label>
              <select type="select"  class="form-control" id="equipe" name="equipe">
              <option>aucune equipe</option>
                @foreach($lesequipes as $lequipe)
                  <option>{{$lequipe->id}}</option>
                @endforeach
              </select>
              <span style="color:red"> @error('equipe') {{$message}} @enderror</span>
              <label for="equipe">Role</label>
              <select type="select"  class="form-control" id="role" name="role">
                @foreach($roles as $lrole)
                  <option>{{$lrole->nomRole}}</option>
                @endforeach
              </select>
              <span style="color:red"> @error('equipe') {{$message}} @enderror</span>
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
<!--Modal de modification d'equipe -->
<div   class="modal fade" id="modifierEquipe" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Modifier Equipe</h3>
          <form action="{{ route('modifierEquipe')}}" method="post">
            @csrf
            <input type="hidden" name="equipeid" id="equipeid" value="" >
            <div class="form-group">
              <label for="specialite">Spécialité</label>
              <select type="select"  class="form-control" id="specialite" name="specialite" value="">
                  <option>Développement web</option>
                  <option>Développement mobile</option>
                  <option>E-commerce</option>
                  <option>SEO</option>
                  <option>Redaction du contenu</option>
              </select>
              <span style="color:red"> @error('specialite') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="membre"> Membres</label>
                
              @foreach($users as $user)
                <div class="form-check" >
                
                 <input id="membre" name="membre[]" class="form-check-input" type="checkbox" value="{{$user->name}}">
                 <label class="form-check-label" for="flexCheckDefault" >
                   {{$user->name}}
                 </label>
                 
              </div>
              @endforeach
              <span style="color:red"> @error('specialite') {{$message}} @enderror</span>
            
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
<!--Modal de suppression d'equipe -->
<div class="modal fade" id="supprimerEquipe" tabindex="-1" aria-labelledby="supprimerEquipeLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:30px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
     <form action="{{route('supprimerEquipe')}}" method="post" enctype="multipart/form-data">
     {{method_field('delete') }}
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="supprimerEquipeLabel">{{ __('Supprimer Equipe') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> X </button>
      </div>
    
     
      <div class="modal-body">
      <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:150px; padding-top:10px;" >   Vous etes sur de vouloir supprimer cette équipe?</p>
      
      
      <input type="hidden" name="equipeid" id="equipeid" value="" >
      </div>
      <div class="modal-footer">
        <button style="border-radius:20px; width:150px; position:relative;right:250px;" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
        <button style="border-radius:20px;position:relative;right:40px; width:150px;" type="submit" class="btn btn-danger">{{ __('OUI')}}</button>
      </div>
      </form>
    </div></div></div>
<!--Modal d'ajout d'equipe -->
<div   class="modal fade" id="ajouterEquipe" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button  type="button" class="close" data-dismiss="modal"> X </button>
          <h3 class="titreModal">Ajouter Equipe</h3>
          <form action="{{ route('ajouterEquipe')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="specialite">Spécialité</label>
              <select type="select"  class="form-control" id="specialite" name="specialite">
                  <option>Développement web</option>
                  <option>Développement mobile</option>
                  <option>E-commerce</option>
                  <option>SEO</option>
                  <option>Redaction du contenu</option>
              </select>
              <span style="color:red"> @error('specialite') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="membre"> Membres</label>
                
              @foreach($users as $user)
                <div class="form-check" >
                
                 <input id="membre" name="membre[]" class="form-check-input" type="checkbox" value="{{$user->name}}">
                 <label class="form-check-label" for="flexCheckDefault">
                   {{$user->name}}
                 </label>
                 
              </div>
              @endforeach
              <span style="color:red"> @error('membre[]') {{$message}} @enderror</span>
            
            </div>
          
         <div class="modal-footer">
        <button  class="btonModal" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button  type="submit" class="btnModal">Enregistrer</button>
      </div>
   </form>
  </div>
  </div></div></div></div>
<!--Modal de suppression d'equipe -->
<div class="modal fade" id="supprimerEquipe" tabindex="-1" aria-labelledby="supprimerEquipeLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:0px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
     <form action="{{route('supprimerEquipe')}}" method="post" enctype="multipart/form-data">
       {{method_field('delete') }}
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="supprimerEquipeLabel">{{ __('Supprimer Equipe') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> X </button>
      </div>
    
     
      <div class="modal-body" style="padding-left:15px;">
        Vous etes sur de vouloir supprimer cette équipe?
      
      
      <input type="hidden" name="equipeid" id="equipeid" value="" >
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
        <button type="submit" class="btn btn-danger">{{ __('OUI')}}</button>
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