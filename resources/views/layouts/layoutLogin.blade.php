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
.autantQue{
  border:0px;
  width:50%;
  height:40px;
  background-color: #ffff;
  font-weight:bold;
  font-family:Georgia;
  color:#E8621E;
  font-size:25px;
  position:relative;
  top:100px;
  box-shadow: 4px 2px 2px #7DC3EB;
  
  
}
    </style>
</head>

<body>
    <div>
        <div id="barre">
            <img src="\img\logoFCPO.png" alt="logoFCPO" height="125" width="250">
            
        </div>
        <div id="triangle"></div>
        @yield('content')
        </body>
    </div>
</html>