<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="\img\icone.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion FCPO</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
  
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 50px;
  display: inline-block;
}
.dataTables_length{
    position:relative;
    left:35px;
    top:60px;
}
.dataTables_info{
    position:relative;
    left:35px;
}
</style>
</head>




<body>
    <div id="app" class="app  header-lg-none aside-menu-fixed pace-done sidebar-md-show">



        <header class="app-header navbar d-lg-none">



            <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
                <span class="navbar-toggler-icon"></span>
            </button>
       
        </header>


        <div class="app-body">
            @include('partials.menu')
            <main class="main">
  
                   <div  style="padding-top: 20px; padding-left:10px;">
                        <i class="fa fa-2x fa-plus-circle d-lg-show" aria-hidden="true"> {{ $title }}</i>
                    </div>
                    <div style=" position:relative; left:780px; top:-35px;" class="search__container">
                      <input  style="padding-left:30px" class="search__input" type="text" placeholder="Recherche">
                    </div>
                   

                @yield('content')
                <!-- Modal -->

       
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <div class="modal fade" style="top:25%; " id="deconnexion" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius:30px;" >
      <div class="modal-header">
        <h4 style="padding-left:230px; color:#46768B;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight:bolder;" class="modal-title" style="position:relative;" id="">Deconnexion</h4>
        <button type="button" class="close" data-dismiss="modal" > X </button>
      </div>
      <div class="modal-body" >
      <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:200px; color:grey; padding-top:10px; font-weight:bold;" >Voulez vous vraiment se deconnecter?</p>
      </div>
      <div class="modal-footer">
      <a style="background-color:transparent;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <button type="button" class="btn btn-danger btn-lg" style="border-radius:20px; width:150px; position:relative; left:60px;">Deconnexion</button>
    </a>
   <button type="reset" style="border-radius:20px;position:relative;right:400px; width:150px;" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Annuler</button>
</form>

  
     
      </div>
    </div>
  </div>
</div>
               
            </main>
            
        </div>

       
    </div>
           
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>

  <script>

$(document).on("click", ".open-annuler", function () {
     var reunionID = $(this).data('reunionid');
     $(".modal-body #reunionid").val(reunionID );
     
        $('#annulerReunion').modal('show');
});
$(document).on("click", ".open-modifier", function () {
     var reunionID = $(this).data('reunionid');
     var objet = $(this).data('objet');
     var date =$(this).data('date');
     var heure = $(this).data('heure');
     var client = $(this).data('client');
     var contact = $(this).data('contact');
     $(".modal-body #reunionid").val(reunionID );
     $(".modal-body #objet").val(objet );
     $(".modal-body #date").val(date );
     $(".modal-body #heure").val(heure);
     $(".modal-body #client").val(client );
     $(".modal-body #contact").val(contact );
        
});
$(document).on("click", ".annuler-projet", function () {
     var projetID = $(this).data('projetid');
     $(".modal-body #projetid").val(projetID );
     
        $('#annulerProjet').modal('show');
});
$(document).on("click", ".annuler-tache", function () {
     var tacheID = $(this).data('tacheid');
     $(".modal-body #tacheid").val(tacheID );
     
        $('#annulerTache').modal('show');
});
$(document).on("click", ".modifier-projet", function () {
     var projetID = $(this).data('projetid');
     var intitule = $(this).data('intitule');
     var date = $(this).data('date');
     var equipe = $(this).data('equipe');
     var client = $(this).data('client');
     var chefProjet = $(this).data('chefprojet');
     var descriptif = $(this).data('descriptif');
     $(".modal-body #projetid").val(projetID  );
     $(".modal-body #intitule").val(intitule );
     $(".modal-body #deadline").val(date);
     $(".modal-body #equipe").val(equipe);
     $(".modal-body #client").val(client );
     $(".modal-body #chefProjet").val(chefProjet );
     $(".modal-body #descriptif").val(descriptif );
        
});

$(document).on("click", ".terminer-tache", function () {
     var tacheID = $(this).data('tacheid');
    $(".modal-body #tacheid").val(tacheID  );
    
        
});

$(document).on("click", ".open-supprimer", function () {
     var equipeID = $(this).data('equipeid');
    $(".modal-body #equipeid").val(equipeID);
    
        
});
$(document).on("click", ".modifier-equipe", function () {
  var equipeID = $(this).data('equipeid');
    $(".modal-body #equipeid").val(equipeID);
    
        
});
</script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

    <script src="{{ asset('/js/app.js') }}"></script>


    @yield('scripts')

</body>

</html>