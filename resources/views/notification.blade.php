@extends('layouts.layout')

@section('content')
<div style="padding-top:45px;" class="container-fluid text-center">
<section>
  <div class="square_box box_three"></div>
  <div class="square_box box_four"></div>
  <div class="container mt-5">
    <div class="row" style="position:relative; left:30px;" >
 <div class="col-sm-11">
        <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
          <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true">
										<i class="fa fa-times blue-cross"></i>
									</span>
									<span class="sr-only">Close</span>
								</button>
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
          <strong class="font__weight-semibold">les dates de 2 réunions</strong>  ont été recemment modifiées
        </div>

      </div>


      </div>

    </div>
  </div>
</section>
  <div class="row" style="position:relative; left:70px;">
    <div class="col-xs-16 col-sm-10 col-sm-offset-3">
      <div class="new-message-box">
                    <div class="new-message-box-danger">
                        <div class="info-tab tip-icon-danger" title="error"><i></i></div>
                        <div class="tip-box-danger">
                         <p>Soufyane Boukhriss a modifié la date de la réunion avec Monsieur ALBANNI</p>
                        </div>
                    </div>
                </div>
</div>
</div>
  <!-- -->
   <div class="row" style="position:relative; left:70px;" >
    <div class="col-xs-16 col-sm-10 col-sm-offset-3">
      <div class="new-message-box">
                    <div class="new-message-box-success">
                        <div class="info-tab tip-icon-success" title="success"><i></i></div>
                        <div class="tip-box-success">
                            <!--<p><strong>Tip:</strong> If you want to enable the fading transition effect while closing the alert boxes, apply the classes <code>.fade</code> and <code>.in</code> to them along with the contextual class.</p>-->
                            <p>Soufyane Boukhriss a modifié la date de la réunion avec Madame bansaid</p>
                        </div>
                    </div>
                </div>
</div>
</div>
  <!-- -->
   <div class="row" style="position:relative; left:70px;">
    <div class="col-xs-16 col-sm-10 col-sm-offset-3">
      <div class="new-message-box">
                    <div width="80%" class="new-message-box-warning">
                        <div class="info-tab tip-icon-warning" title="error"><i></i></div>
                        <div  class="tip-box-warning">
                          
                            <p>Vous avez plannifié une réunion le 21/02/21 à 15:00 avec le representant al Bank Chaabi</p>
                        </div>
                    </div>
                </div>
</div>
</div>
  <!-- -->
   <div class="row" style="position:relative; left:70px;">
    <div class="col-xs-16 col-sm-10 col-sm-offset-3">
      <div class="new-message-box">
                    <div class="new-message-box-info">
                        <div class="info-tab tip-icon-info" title="error"><i></i></div>
                        <div class="tip-box-info">
                            <!--<p><strong>Tip:</strong> If you want to enable the fading transition effect while closing the alert boxes, apply the classes <code>.fade</code> and <code>.in</code> to them along with the contextual class.</p>-->
                            <p>Soufyane Boukhriss a a plannifié une réunion le 25/02/21 à 09:00 avec le representant al Irfane</p>
                        </div>
                    </div>
                </div>
</div>
</div>
   <!-- -->
   
</div>
		    
@endsection
@section('scripts')

@parent

@endsection