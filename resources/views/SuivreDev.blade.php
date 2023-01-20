@extends('layouts.layout')

@section('content')

<h3 style="position:relative; left:400px; top:35px;font-weight:bolder; color:#46768B ;font-family:Georgia, 'Times New Roman', Times, serif;">{{$intitule}} </h3>
<div  class="row d-flex justify-content-center container">
    <div class="col-md-15">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="fa fa-tasks"></i>&nbsp;Liste des taches</div>
            </div>
            <div class="scroll-area-sm" style="height: auto;">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                            @foreach($taches as $tache)
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-focus"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                
                                                <div class="widget-subheading">
                                                    <div class="badge badge-pill badge-info ml-2" style="font-size:15px;">@if($tache->etat==0)
                                                     Non realisée
                                                     @endif
                                                     @if($tache->etat==1)
                                                     Realisée
                                                     @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="widget-heading" style="font-size:25px;font-family:'Times New Roman', Times, serif; font-weight:bold; position:relative; left:220px; top:-20px;">{{$tache->intituleTache}}</div>
                                            </div>
                                            <?php 
                 $idtache=DB::table('tache')
                 ->where('intituleTache', $tache->intituleTache)
                 ->where('etat', $tache->etat)
                 ->where('devId', $user->id)
                 ->value('id'); ?>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success terminer-tache"   data-target="#terminerTache"  data-toggle="modal"  data-tacheid={{$idtache}}> <i class="fa fa-check"></i></button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach   
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            
        </div>
    </div>
</div>
<!--modal -->
<div class="modal fade" id="terminerTache" tabindex="-1" aria-labelledby="terminerTacheLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:150px;">
    <div class="modal-content" style="border-radius:30px; font-family: 'Times New Roman', Times, serif;color:gray;font-weight: bolder;
   padding-right:15px;">
        
     <form action="{{route('terminerTache')}}" method="post" enctype="multipart/form-data">
     @csrf
      <div class="modal-header">
      
      <h4  style="padding-left:230px; color:#46768B;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight:bolder;" class="modal-title" id="annulerReunionLabel">{{ __('Terminer Tache') }}</h4>


        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
       <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
      </svg>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> X </button>
      </div>
    
     
      <div class="modal-body " style="padding-left:15px;">
      <p style="font-family: Georgia, 'Times New Roman', Times, serif;
  padding-left:150px; padding-top:10px;" > Vous avez vraiment terminé cette tache? </p>
       
      
      <input type="hidden" name="tacheid" id="tacheid" value="" >
      </div>
      <div class="modal-footer">
        <button  style="border-radius:20px; width:150px; position:relative;right:250px;" type="close" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Non')}}</button>
        <button style="border-radius:20px;position:relative;right:40px; width:150px;"  type="submit" class="btn btn-success">{{ __('OUI')}}</button>
      </div>
      </form>
    </div>
@parent
@endsection