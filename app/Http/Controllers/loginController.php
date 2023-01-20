<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class loginController extends Controller
{

    
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function logout(){
        $userSession::get('user');
        DB::table('users')
              ->where('id',$user->id)
              ->update(['derniereConnexion' => date("Y-m-d")]);
        exit();
        session_destroy();

        Session::forget('user');
        return redirect('login');
    }
  
    public function index(Request $request)
    {  
      
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
               
           ]
        );
        $user = User::where('email', $request->email)->first();
      
        if ($user &&
            Hash::check($request->password, $user->password)) {
                $userid=$user ->id ;
                $userName=$user->name;
                $roleID=DB::table('user')->where([
                    ['userID', '=', $userid],
                ])->value('roleID') ;
                $role =DB::table('role')-> where([
                    ['id', '=', $roleID],
                ])->value('nomRole') ;
                $request->session()->put('user',$user);
                if ($role=='Admin') {
                    return redirect('/Admin/notification/')-> with('success', $userName)->with('role', $role) ;

                } elseif ($role=='Secretaire'){
                   
                    return redirect('/Secretaire/notification')-> with('success', $userName)-> with('role', $role) ;
                } elseif ($role=='Developpeur'){
                    return redirect('/developpeur/notification')-> with('success', $userName) -> with('role', $role) ;
                } elseif ($role=='Chef Projet'){
                    return redirect('/chefProjet/notification')-> with('success', $userName)-> with('role', $role) ;
                }else{
                    return redirect('/choice')-> with('success', $userName)->with('role', $role) ;
                }
        }elseif(!$user){
            return back()-> with('fail','votre login est invalide') ;
        }
        else{
            return back()-> with('faute','Votre mot de passe est incorrect') ;
        }
       

    }
    
  
}