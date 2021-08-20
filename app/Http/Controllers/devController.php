<?php

namespace App\Http\Controllers;
class devController extends Controller
{
    
    public function showNotifications(){
        $role='Developpeur';
        $title='Notifications';
        return view('notification',compact('role','title'));
    }
    public function showProjets(){
        $role='Developpeur';
        $title='Projets';
        return view('projets',compact('role','title'));
    }
    public function suivre(){
        $role='Developpeur';
        $title='Projets';
        return view('SuivreDev',compact('role','title'));
    }
    public function Compte(){
        $role='Developpeur';
        $title='Compte';
        return view('Compte',compact('role','title'));
    }
}