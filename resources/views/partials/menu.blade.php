<div class="sidebar"  style="background-color: #46768B;">
   <img src="\img\logoFCPO.png" alt="logoFCPO" height="110px" width="199px">
    <div class="role" style="padding-top: 18px ; padding-bottom: 11px ;">
        <?php if($role=='Secretaire'){?>
        <span class="iconify" data-inline="true" data-icon="ps:girl-user" style="color: #ffff; font-size:46px;"></span>
        
        
        <?php }
        if($role=='Developpeur'){?>
            <span class="iconify" data-inline="false" data-icon="bi:person" style="color: #ffff; font-size: 46px;"></span>
            
            <?php }
        if($role=='Chef Projet'){?>
            <span class="iconify" data-inline="false" data-icon="vs:user-boss" style="color: #ffff; font-size: 43px;"></span>
            <?php } 
            if($role=='Admin'){?>
                <span class="iconify" data-inline="false" data-icon="wpf:administrator" style="color: #ffff; font-size: 46px;"></span>
                <?php }   
             ?>


              <h3 > {{ $role }}</h3>
    </div>

    


    <nav class="sidebar-nav">

        <ul class="nav" >
            <li class="nav-item">
                <a href="{{ route($role.'notification') }}" class="nav-link ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
                    Notifications
                </a>

            </li>
  <?php if($role=='Secretaire' || $role=='Admin' ){?>
    <li  class="nav-item nav-dropdown">
                <a  style="color:white;"class="nav-link    nav-dropdown-toggle" href="{{ route($role.'reunions') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff"  class="bi bi-journal-bookmark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
    </svg>
            
                    Réunions
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a href="{{ route($role.'reunions') }}" class="nav-link  ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#ffff"  class="bi bi-record-circle" viewBox="0 0 16 16">
                         <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
     </svg>
                            à venir
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route($role.'historique') }}" class="nav-link  ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#ffff"  class="bi bi-record-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
   </svg>
                            historique
                        </a>
                    </li>

                </ul>
            </li>


 <?php }?>
 <?php if($role!='Secretaire' ){?>   
    <li class="nav-item">
                <a href="{{ route($role.'projets') }}" class="nav-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-clipboard-data" viewBox="0 0 16 16">
  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
    </svg>
                   Projets
                </a>
            </li>
    
<?php }?>
<?php if($role=='Admin' ){?>   
    <li class="nav-item">
                <a href="{{ route($role.'equipes') }}" class="nav-link ">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg> Equipes  </a>
            </li>
    
<?php }?>
            <li class="nav-item">
                <a href="{{ route($role.'compte') }}" class="nav-link  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#ffff"  class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
                    Mon compte
                </a>
            </li>
            <li class="nav-item">

                <a class="nav-link" style="cursor:pointer;" id="openModalLink" data-toggle="modal" data-target="#deconnexion">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                 </svg>
                   Deconnexion
</a>
            </li>


        </ul>

    </nav>

</div>

   <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>



‏

<style>
    h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size:25px;
         position:absolute;
         margin-top:8px;
         margin-left:50px;
         padding-bottom: 11px
          color: white;
       
    }
    img{
        background-color:white;
    }
    
  .iconify{
      padding-left:12px;
      
  }
  .role{
      display:flex;
      flex-direction:row;
  }
  a{
    background-color:#46768B;
  }

</style>