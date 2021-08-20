<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" href="\img\icone.png" />
    <title>Se connecter</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #46768B;
            height: 70vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 45px;
            margin-left: 62px;
            max-width: 420px;
            height: 320px;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        .mybtn {
            margin: auto;
            max-width: 180px;
            border-radius: 50px;
            background-color: #EF6E35;
        }
        #barre {
            height: 25vh;
            background-color: white;
            display: flex;
             justify-content: center;
        }
        h3 {
            color: #E5E5E5;
        }
        #triangle{
          font-size: 0px; line-height: 0%; width: 0px;
         border-top: 5vh solid white;
         border-left: 40px solid transparent; 
         border-right: 40px solid transparent; 
         
         margin-left: auto;
         margin-right: auto;
}a{
    text-decoration: underline;
}
#person{
    position:absolute;
    margin-top:12px;
    margin-left:13px;
}
#pass{
    position:absolute;
    margin-top:10px;
    margin-left:13px;
}
input{
   padding-left:50px;
}
    </style>
</head>

<body>
    <div>
        <div id="barre">
            <img src="\img\logoFCPO.png" alt="logoFCPO">
            
        </div>
        <div id="triangle"></div>
        <div id="login">

            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6 ">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form " method="POST" action="{{ route('login') }}">
                            @csrf
                           
                                <h3 class="text-center text-grey ">Connexion</h3>
                                <br>
                                <div class="form-group">
                                  
                                     <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="grey" id="person" class="bi bi-person-fill" >
                                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg>
                                     <input style="border-radius: 50px; padding-left:50px" id="username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Saisir votre login">
                                     
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>
                                
                                <div class="form-group">
                                
                                <svg id="pass" xmlns="http://www.w3.org/2000/svg" width="25" height="15" fill="grey" class="bi bi-lock-fill" >
                                 <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                  </svg>
                                    <input style="border-radius: 50px; padding-left:50px"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Saisir votre mot de passe">
                                    </div>
                                    <div class=" form-group text-right">
                                    <a href="#" class="text-white">Mot de passe oublié?</a>
                                
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

    </div>
    
