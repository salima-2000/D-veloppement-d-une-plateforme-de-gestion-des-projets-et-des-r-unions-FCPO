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
 <div class="main-body">
      <div class="row gutters-sm">
            
              <div class="card">
               
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/img/personProfil.png" alt="Admin" class="rounded-circle" width="100" height="90">
                    <div class="mt-3">
                      <h4 style="color:#46768B;">{{$user->name}}</h4>
                      <p class="text-secondary mb-1">{{$user->specialite}}</p>
                      <div style="display:flex; flex-direction:row;">
                          <h5>Login :</h5>
                          <p class="info">{{$user->email}}</p>
                      </div>
                      <div  style="display:flex; flex-direction:row;">
                          <h5>Roles  :</h5>
                          <p class="info">
                          {{$role}}
                          </p>
                      </div>
                      <div  style="display:flex; flex-direction:row;">
                          <h5>Derniere Connexion:</h5>
                          <p class="infoS" >{{$user->derniereConnexion}}</p>
                      </div>
                    </div>
                    <div style="padding-left:25%">
<button class="btan" data-toggle="modal" data-target="#changerMotPasse" type="button">Modifier mot de passe</button>
</div> 
                    
                  
                
              </div>
             

            </div>
          </div>

        </div>
    </div>
 
    
  <div   class="modal fade" style="margin-top:120px;" id="changerMotPasse" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="column" id="main">
        <button class="close" data-dismiss="modal">X </button>
          <h3 class="titreModal">{{ __('Changer Mot de Passe') }}</h3>
          
          <form method="post" action="{{ route('changePassword') }}">
            @csrf
          
         
            <div class="input-group mb-3" class="form-group">
              <label for="current_password">{{ __('Mot de Passe actuel') }}</label>
              <input  id="current_password" type="password" class="form-control" name="current_password" required autofocus >
              <span style="color:red"> @error('current_password') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for="password">{{ __('Nouveau Mot de Passe') }}</label>
              <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" >
              <span style="color:red"> @error('password') {{$message}} @enderror</span>
            </div>
            <div class="input-group mb-3" class="form-group">
              <label for="password-confirm">{{ __('Retaper le Mot de Passe') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              <span style="color:red"> @error('password_confirmation') {{$message}} @enderror</span>
            </div>
            
            <div class="modal-footer">
        <button  class="btonModal" type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button  type="submit" style="background-color: #46768B;" class="btnModal">  {{ __('Enregistrer') }}</button>
      </div>
          </form>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection
@section('scripts')

@parent

@endsection