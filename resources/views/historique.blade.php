@extends('layouts.layout')

@section('content')

<div style="position:relative; top:50px;">
<table id="example" class="table table-striped table-bordered" style="width:95% ;padding-top:60px;">
<?php 
 $today = date("Y-m-d H:i:s");
 $reunions=DB::table('reunion')->select('objetReunion', 'dateReunion','heureReunion','client','contactClient')
                               ->where('dateReunion','<',date("Y-m-d"))->get();
  ?>      
 <thead>
            <tr>
                <th>Objet de réunion</th>
                <th>date de réunion</th>
                <th>Heure</th>
                <th>Client</th>
                <th>Contact Client</th>
                
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
               </tr>
        @endforeach
        </tbody>
      
    </table>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable(
        {  "language": {
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


@endsection
