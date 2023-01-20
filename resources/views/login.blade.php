@extends('layouts.layoutLogin')

@section('content')
 <div id="login">

            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6 ">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form "  method="POST" action="{{ route('redirects') }}">
                            @csrf
                           
                                <h3 class="text-center text-grey ">Connexion</h3>
                                <br>
                                <div class="form-group">
                                  
                                     <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="grey" id="person" class="bi bi-person-fill" >
                                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg>
                                     <input style="border-radius: 50px; padding-left:50px" id="username" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Saisir votre login">
                                    
                                     <span style="color:red ; padding-left:35px;"> 
                                       @error('email'){{ $message }}@enderror
                                       @if(Session::get('fail'))
                                       {{$message=Session::get('fail');}}
                                       @endif
                                    </span>
                                     
                                
                                  
                                </div>
                                <br>
                                
                                <div class="form-group">
                                
                                <svg id="pass" xmlns="http://www.w3.org/2000/svg" width="25" height="15" fill="grey" class="bi bi-lock-fill" >
                                 <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                  </svg>
                                    <input style="border-radius: 50px; padding-left:50px"  id="password" type="password" class="form-control" name="password"  placeholder="Saisir votre mot de passe">
                                    <span style="color:red; padding-left:35px;">
                                        @error('password') {{ $message }} @enderror
                                        @if(Session::get('faute'))
                                       {{$message=Session::get('faute');}}
                                       @endif
                                    </span>
                                </div>
                                   
                                    @if (Route::has('password.request'))
                                    <div class=" form-group text-right">
                                    <a  href="{{ route('password.request') }}" class="text-white">{{ __('Mot de passe oublié?') }}</a>
                                    @endif
                                   
                                
                                   
                                   
                                    
                                </div>
                                <br>
                                <div class="col-md-12 text-center ">
                                    <Button type="submit" class=" btn btn-block mybtn text-white  "> <strong> {{ __('Se connecter') }}</strong></Button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- <login></login> -->
@endsection
@section('scripts')

@parent

@endsection