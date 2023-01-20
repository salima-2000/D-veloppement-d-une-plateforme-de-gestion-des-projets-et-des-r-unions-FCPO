<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use App\Mail\envoyerMotPasse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    

    public function showNotifications(){
       $userid=Session::get('user')->id;
        $role='Admin';
        $title='Notifications';
        $derniereConnexion=DB::table('users')
        ->where('users.id','=',$userid)
        ->value('derniereConnexion');
        $notifications=DB::table('notification')
       // ->where('dateAjout','>','derniereConnexion')
        ->select('action','responsable','objet','importance')
        ->get();
      

      $nombreChangement=$notifications->count();
        return view('notification',compact('role','title','notifications','nombreChangement','derniereConnexion'));

    }
    public function GererProjets(){
        $role='Admin';
        $title='Projets';
        $equipes=DB::table('equipe')->select('id', 'specialite')->get();
        $chefsEquipe=DB::table('users')
                    ->join('user','user.userID','users.id')
                    ->join('role','role.id','user.roleID')
                    ->where('role.id','<>',1)
                    ->where('role.id','<>',2)
                    ->where('role.id','<>',3)
                    ->select('name')->get();
        $projets=DB::table('projet')->select('intituleProjet', 'client','deadline','description','equipeID','chefProjet')
        ->get();
        return view('projets',compact('role','title','projets','equipes','chefsEquipe'));
    }
    public function showHistorique(){
        $role='Admin';
        $title='historique';
        return view('historique',compact('role','title'));
    }
    public function showEquipes(){
        $users=DB::table('users')
                 ->join('user','user.userID','users.id')
                ->where('user.roleID','<>',1)
                ->where('user.roleID','<>',2)
                ->select('name')
               ->get();
        $roles=DB::table('role')-> select('id','nomRole') ->get();
        $lesequipes=DB::table('equipe')-> select('id') ->get();
        $equipes=DB::table('equipe')->select('id', 'specialite')->get();
        $role='Admin';
        $title='Equipes';
        return view('equipes',compact('role','title','equipes','users','roles','lesequipes'));
    }
    public function showProfil($id){
        $membres=DB::table('users')->where('users.id','=',$id) ->select('name','email','specialite','profilImage')
                ->get();
        $projets=DB::table('projet')
               ->join('tache','projet.id','projetID')
               ->where('devId','=',$id)
               ->select('intituleProjet','projet.id')->get();

        $role='Admin';
        $title='Equipes';
        return view('ProfilMembre',compact('role','title','id','membres','projets'));
    }
    public function showReunions(){
        $role='Admin';
        $title='Réunions';
        return view('reunions',compact('role','title'));
    }
    public function suivreProjet($id){
        $equipeID=DB::table('projet')
        ->where('id','=',$id)
        ->value('equipeID');
        $taches=DB::table('tache')
        ->where('projetID','=',$id)
        ->select('intituleTache', 'etat','devId')
        ->get();
        $intitule=DB::table('projet')
        ->where('id','=',$id)
        ->value('intituleProjet');
        $devID=DB::table('tache')
        ->where('projetID','=',$id)
        ->value('devId');
        $responsable=DB::table('users')
        ->where('users.id','=',$devID )
        ->first();
        $developpeurs=DB::table('users')
        ->join('user','user.userID','users.id')
        ->where('user.roleID','<>',1)
        ->where('user.roleID','<>',2)
        ->where('user.equipeID','=',$equipeID)
        ->select('users.id','name')
        ->get();
        $role='Admin';
        $title='Taches';
        return view('SuivreProjet',compact('role','intitule','title','taches','responsable','id','devID','developpeurs',));
    }


    public function ajouterEquipe(Request $request){
        
       $request->validate(
          [
              'specialite' => 'required'
          ]
      );
     
      $specialite= $request-> input('specialite');
      
      $equipeID= DB::table('equipe')->insertGetId([
        'specialite' => $specialite
     ]);
      $membres= $request-> input('membre');
      foreach($membres as $membre){
        $query=$id=DB::table('users')->where('name','=',$membre)->value('id');
          DB::table('user')->where('user.userID','=',$id)->update(
            [
                'equipeID' => $equipeID
            
            ]
        );
          
      }
      
    
      
       if($query){
         return redirect('/Admin/equipes')-> with('success','l\'equipe a été bien ajoutée :)') ;
       }else{
        return redirect('/Admin/equipes')-> with('fail','veuillez reessayer! ce n est pas bien passé') ;
       
    }
} 

public function supprimerEquipe(Request $request){
    $id=$request-> input('equipeid');
    $user=Session::get('user');
    DB::table('user')->where('user.userID', '=', $id)->update([
        'equipeID' => 0
]);

$query= DB::table('equipe')->where('id', '=', $id)->delete();
    
     if($query){
        return back()-> with('success','l\'equipe a été bien supprimée :)') ;
    
     }else{
        return back()-> with($id.'fail','veuillez reessayer! ce n\'est pas bien passé') ;
     }
       
}

public function modifierEquipe(Request $request){
    $request->validate(
        [
            'specialite' => 'required'
        ]
    );
   
    $specialite= $request-> input('specialite');
    $equipeID=$request-> input('equipeid');
    $membres= $request-> input('membre');
    $query=DB::table('equipe')->where('id','=',$equipeID)->update(
        [
            'specialite' => $specialite
        ]
        );
    foreach($membres as $membre){
      $id=DB::table('users')->where('name','=',$membre)->value('id');
        DB::table('user')->where('user.userID','=',$id)->update(
          [
              'equipeID' => $equipeID
          
          ]
      );
        
    }
    
    if($query){
        return back()-> with('success','l\'equipe a été bien  modifiée :)') ;
        DB::table('notification')->insert([
            'objet' => 'projet',
            'responsable' =>$user->name,
            'action'=>'a modifié les informations du projet '. $objet,
            'dateAjout' => date("Y-m-d"),
            'importance' => 'modification'
            
  
         ]);
     }else{
        return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
     }
}

public function ajouterMembre(Request $request){
    $request->validate(
        [
            'name' => 'required' ,
            'email' => 'required' ,
            'specialite'  => 'required' ,
            'equipe'  => 'required' ,
            'role' => 'required'
        ]
    );
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 9; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $motPasse=Hash::make($randomString);
    $id=DB::table('users')->insertGetId([
        'name' => $request-> input('name'),
        'email' => $request-> input('email'),
        'specialite' => $request-> input('specialite'),
        'password'=> $motPasse

     ]);
     $role=DB::table('role') ->where('nomRole','=',$request-> input('role'))->value('id');
     $query= DB::table('user') ->insert(
         [
             'userID' => $id,
             'roleID' => $role,
             'equipeID'=> $request-> input('equipe')

         ]
         );
         if($query){
             //Mail::to($request-> input('email')) ->send(new envoyerMotPasse($randomString));
            return redirect('/Admin/equipes')-> with('success','le membre a été bien ajouté :)') ;
        
         }else{
            return redirect('/Admin/equipes')-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
         }
    
}

}
