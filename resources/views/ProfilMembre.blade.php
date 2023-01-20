@extends('layouts.layout')
@section('content')
@foreach($membres as $membre)
<div class="container">
    <div class="main-body">
         <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                    
                      <h4>{{$membre->name}}</h4>
                      <p class="text-secondary mb-1">{{$membre->specialite}}</p>
    
                    </div>
                  </div>
                </div>
              </div>
 
            <div style=" position:relative; left:300px; top:-320px;" class="col-md-16">
              <div class="card mb-3" style="width:500px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0">Nom Complet</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$membre->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$membre->	email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" style="padding-right:20px; padding-left:20px;" >Modifer</a>
                   
                      <a class="btn btn-danger" >supprimer</a>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-sm-12 mt-6">
                  <div class="card" style="width:500px;">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Contribution dans les projets</h6>
                      @foreach($projets as $projet)
                      <small>{{$projet->intituleProjet}}</small>
                      <?php 
                      $taches= DB::table('tache')
                      ->where('projetID','=',$projet->id)
                      ->count();
                     $tachesRealisées= DB::table('tache')
                      ->where('projetID','=',$projet->id)
                      ->where('devId','=',$id)
                      ->count();
                      if($taches==0){
                        $progress=0;
                      }else{
                       $progress=$tachesRealisées/$taches*100;
                      }
                      ?>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$progress}}" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    
                     @endforeach
                    </div>
                  </div>
                </div>
             
              </div>



            </div>
          </div>

        </div>
    </div>
   @endforeach
@parent
@endsection