@extends('layouts.layoutLogin')

 @section('content')
 @if(Session::get('success'))

<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Bienvenue :) </strong>Heureux de vous revoir {{Session::get('success')}}
  </div>
 @endif
  <h3 class="text-left text-grey ">Se connecter autant que :</h3>
                       
  <div style=" padding-left:35%; position:relative;top:-50px;">
  <a  href="/developpeur/notification"><button class="autantQue" style="outline: 0;"  type="button">Developpeur</button></a>
  </div>
  <br>
  <br>
  <div style=" padding-left:35%; position:relative;top:-50px;">
  <a href="/chefProjet/notification"><button class="autantQue" style="outline: 0;" type="button">Chef Projet</button></a>
  </div>    
@endsection