<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class SecretaireController extends Controller
{
   
    public function showNotifications(Request $request){
        $userid=Session::get('user')->id;
        $name=DB::table('users')
        ->where('users.id','=',$userid)
        ->value('name');
    $derniereConnexion=DB::table('users')
                ->where('users.id','=',$userid)
                ->value('derniereConnexion');

        
        $notifications=DB::table('notification')
      //  ->where('dateAjout','>','derniereConnexion')
        ->where('objet','=','reunion')
        ->select('action','responsable','importance')
        ->get();
        $role='Secretaire';
        $title='Notifications';
        $nombreChangement=$notifications->count();
        return view('notification',compact('role','title','notifications','nombreChangement','derniereConnexion'));
    }
    public function showReunions(){
        $role='Secretaire';
        $title='Réunions';
        return view('reunions',compact('role','title'));
    }
    public function Historique(){
        $role='Secretaire';
        $title='historique';
        return view('historique',compact('role','title'));
    }
 
}