<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class devController extends Controller
{
    
   
    public function showNotifications(){
        $userid=Session::get('user')->id;
        $role='Developpeur';
        $title='Notifications';
        $name=DB::table('users')
        ->where('users.id','=','userid')
        ->value('name');
        $derniereConnexion=DB::table('users')
        ->where('users.id','=',$userid)
        ->value('derniereConnexion');
     
        $notifications=DB::table('notification')
        /*->join('projet','projet.id','=','notification.objetID')
        ->join('tache','projet.id','=','tache.projetID')*/
        //->where('notification.dateAjout','<','derniereConnexion')
        ->where('objet','=','projet')
        //->where('tache.devID','=','userid')
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
        ->join('tache','tache.projetID','projet.id')
        ->where('tache.devId','=',$user->id)
        ->select('intituleProjet', 'client','deadline','description','chefProjet','equipeID')
        ->get();
        $role='Developpeur';
        $title='Projets';
        return view('projets',compact('role','title','projets','equipes','chefsEquipe'));
    }
    public function suivre($id){
        $intitule=DB::table('projet')
        ->where('id','=',$id)
        ->value('intituleProjet');
       $user=Session::get('user');
        $taches=DB::table('tache')
        ->where('projetID','=',$id)
        ->where('devId','=',$user->id)
        ->select('intituleTache', 'etat')
        ->get();
     
        $role='Developpeur';
        $title='Projets';
        return view('SuivreDev',compact('role','title','taches','intitule','user'));
    }
   
    public function terminerTache(Request $request){
        $id= $request-> input('tacheid');
        $query=DB::table('tache')
        ->where('id', '=', $id)
        ->update(
            [
                'etat' => 1
            ]
        );
        if($query){
          
             return back()-> with('success','Bravo :) Vous avez terminé une tache') ;
         }else{
            return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
         }
    }
    
}