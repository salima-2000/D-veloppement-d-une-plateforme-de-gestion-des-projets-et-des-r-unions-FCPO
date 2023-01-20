<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Compte extends Controller
{


    public function Compte(){
        $user=Session::get('user');
        $role=DB::table('user')
        ->join('role','role.id','user.roleID')
        -> where('user.userID','=',$user->id)
        ->value('role.nomRole');
        $title='Compte';
        return view('Compte',compact('role','title','user'));
    }
public function changePassword(Request $request)
    {  
        $user=Session::get('user');
        $role=DB::table('user')
             ->join('role','role.id','user.roleID')
             -> where('user.userID','=',$user->id)
             ->value('role.nomRole');
        $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required'
               
           ]
        );
        if(Hash::check($request->input('current_password'),$user->password)){
            $query=DB::table('users')
            ->where('id', '=', $user->id)
            ->update(
               [
                   'password' => Hash::make($request->input('password'))
               ]
           );   
           return redirect('/'.$role.'/compte')-> with('success','votre mot de passe a été bien  modifié :)') ;
            
        }else{
            return redirect('/'.$role.'/compte')-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
        }
       
    }
}