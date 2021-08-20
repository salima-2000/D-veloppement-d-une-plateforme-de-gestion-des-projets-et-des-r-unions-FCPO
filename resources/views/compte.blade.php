@extends('layouts.layout')

@section('content')


    <div class="main-body">
      <div class="row gutters-sm">
            
              <div class="card">
               
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 style="color:#46768B;">Nom Prenom</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <div style="display:flex; flex-direction:row;">
                          <h5>Login :</h5>
                          <p class="info">login@FCPO.ma</p>
                      </div>
                      <div  style="display:flex; flex-direction:row;">
                          <h5>Roles  :</h5>
                          <p class="info">Exemple Role </p>
                      </div>
                      <div  style="display:flex; flex-direction:row;">
                          <h5>Derniere Connexion:</h5>
                          <p class="infoS" >13/08/2021</p>
                      </div>
                    </div>
                    <div style="padding-left:25%">
<button class="btan" type="button">Modifier mot de passe</button>
</div> 
                    
                  
                
              </div>
             

            </div>
          </div>

        </div>
    </div>
             
@endsection
@section('scripts')

@parent

@endsection