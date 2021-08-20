<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" href="\img\icone.png" />
    <title>Choice</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #46768B;
            height: 70vh;
        }
    
        #barre {
            height: 25vh;
            background-color: white;
            display: flex;
             justify-content: center;
        }
        h3 {
            color: #E5E5E5;
            margin-left:180px;
            font-size:30px;
            margin-top:50px;
        }
        #triangle{
          font-size: 0px; line-height: 0%; width: 0px;
         border-top: 5vh solid white;
         border-left: 40px solid transparent; 
         border-right: 40px solid transparent; 
         margin-left: auto;
         margin-right: auto;
} 
button{
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
    
        <div id="barre">
            <img src="\img\logoFCPO.png" alt="logoFCPO">
            
        </div>
        <div id="triangle"></div>
        <h3 class="text-left text-grey ">Se connecter autant que :</h3>
                       
  <div style=" padding-left:35%; position:relative;top:-50px;">
  <button style="outline: 0;"  type="button">Developpeur</button>
  
  </div>
  <br>
  <br>
  <div style=" padding-left:35%; position:relative;top:-50px;">
  <button style="outline: 0;" type="button">Chef Projet</button>
  </div>    
    
</body>

</html>