@extends('layouts.layout')

@section('content')
<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">
        <thead>
            <tr>
                <th>Equipe</th>
                <th>Spécialité</th>
                <th>Membres</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Développemet web</td>
                <td><article class="leaderboard">
  <main class="leaderboard__profiles">
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mark Zuckerberg" class="leaderboard__picture">
      <span class="leaderboard__name">Mark Zuckerberg</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Dustin Moskovitz" class="leaderboard__picture">
      <span class="leaderboard__name">Dustin Moskovitz</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Elizabeth Holmes" class="leaderboard__picture">
      <span class="leaderboard__name">Elizabeth Holmes</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
      <span class="leaderboard__name">Evan Spiegel</span>
     
    </article>
  </main>
</div></td>
                <td><a style="background-color:transparent; color:#037CC2; text-decoration:underline; font-weight:bold;">Modifier</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Développement Mobile</td>
                <td>
                <article class="leaderboard">
  <main class="leaderboard__profiles">
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mark Zuckerberg" class="leaderboard__picture">
      <span class="leaderboard__name">Mark Zuckerberg</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Dustin Moskovitz" class="leaderboard__picture">
      <span class="leaderboard__name">Dustin Moskovitz</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Elizabeth Holmes" class="leaderboard__picture">
      <span class="leaderboard__name">Elizabeth Holmes</span>
     
    </article>
  </main>
</div>
                </td>
                <td><a style="background-color:transparent; color:#037CC2; text-decoration:underline; font-weight:bold;">Modifier</a></td>
                
            </tr>
            <tr>
                <td>3</td>
                <td>Rédaction de contenu</td>
                <td>
                <article class="leaderboard">
  <main class="leaderboard__profiles">
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mark Zuckerberg" class="leaderboard__picture">
      <span class="leaderboard__name">Mark Zuckerberg</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Dustin Moskovitz" class="leaderboard__picture">
      <span class="leaderboard__name">Dustin Moskovitz</span>
     
    </article>
    
    <article class="leaderboard__profile">
      <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Elizabeth Holmes" class="leaderboard__picture">
      <span class="leaderboard__name">Elizabeth Holmes</span>
     
    </article>
  </main>
</div>
                </td>
                <td><a style="background-color:transparent; color:#037CC2; text-decoration:underline; font-weight:bold;">Modifier</a></td>
            
            </tr>
        </tbody>
      
    </table>
</div>
<div style="padding-left:25%">
<button class="bton" type="button">Ajouter Equipe</button>
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
