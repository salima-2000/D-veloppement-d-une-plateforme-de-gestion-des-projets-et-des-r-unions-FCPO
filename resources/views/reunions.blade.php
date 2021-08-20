@extends('layouts.layout')

@section('content')
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
            <tr>
                <td>Harum trium</td>
                <td>23/07/202</td>
                <td>15.30</td>
                <td>nulli prorsus</td>
                <td>062463298</td>
                <td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Choisir
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Annuler</a></li>
    <li><a class="dropdown-item" href="#">Modifier</a></li>
    
  </ul>
</div></td>
            </tr>
            <tr>
                <td>Harum trium</td>
                <td>23/07/202</td>
                <td>15.30</td>
                <td>nulli prorsus</td>
                <td>062463298</td>
                <td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Choisir
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Annuler</a></li>
    <li><a class="dropdown-item" href="#">Modifier</a></li>
    
  </ul>
</div></td>
            </tr>
            <tr>
                <td>Harum trium</td>
                <td>23/07/202</td>
                <td>15.30</td>
                <td>nulli prorsus</td>
                <td>062463298</td>
                <td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Choisir
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Annuler</a></li>
    <li><a class="dropdown-item" href="#">Modifier</a></li>
    
  </ul>
</div></td>
            </tr>
        </tbody>
      
    </table>
</div>
<div style="padding-left:25%">
<button class="bton" type="button">Programmer une réunion</button>
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




