<?php

namespace App\Http\Controllers;
use Session;
use DB;
class ChefProjetController extends Controller
{

    public function showNotifications(){
        $user=Session::get('user');
        $role='Chef Projet';
        $title='Notifications';
        $name=DB::table('users')
        ->where('users.id','=','userid')
        ->value('name');
        $derniereConnexion=DB::table('users')
        ->where('users.id','=',$user->id)
        ->value('derniereConnexion');

     
       $notifications=DB::table('notification')
        ->join('projet','projet.id','=','notification.objetID')
       //->where('notification.dateAjout','<','derniereConnexion')
        ->where('objet','=','projet')
        ->where('chefProjet','=',$name)
        ->select('action','responsable','objet','importance')
        ->get();
        $nombreChangement=$notifications->count();
        return view('notification',compact('role','title','notifications','nombreChangement','derniereConnexion'));
    }
    public function showProjets(){
        $user=Session::get('user');
        $chefsEquipe=DB::table('users')
                    ->join('user','user.userID','users.id')
                    ->join('role','role.id','user.roleID')
                    ->where('role.id','<>',1)
                    ->where('role.id','<>',2)
                    ->where('role.id','<>',3)
                    ->select('name')->get();
        $equipes=DB::table('equipe')->select('id', 'specialite')->get();
        $projets=DB::table('projet')
        ->where('projet.chefProjet','=',$user->name)
        ->select('intituleProjet', 'client','deadline','description','equipeID')
        ->get();
        $role='Chef Projet';
        $title='Projets';
        return view('projets',compact('role','title','projets','chefsEquipe','equipes'));
    }
    
    public function suivre($id){
      
        $equipeID=DB::table('projet')
        ->where('id','=',$id)
        ->value('equipeID');
        $taches=DB::table('tache')
        ->where('projetID','=',$id)
        ->select('intituleTache', 'etat','devId')
        ->get();
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
        $role='Chef Projet';
        $title='Projets';
        return view('SuivreProjet',compact('role','title','taches','responsable','id','devID','developpeurs'));
    }
 
}