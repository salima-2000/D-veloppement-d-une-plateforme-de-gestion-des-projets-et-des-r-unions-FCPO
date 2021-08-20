<?php

namespace App\Http\Controllers;
class ChefProjetController extends Controller
{
    
    public function showNotifications(){
        $role='Chef Projet';
        $title='Notifications';
        return view('notification',compact('role','title'));
    }
    public function showProjets(){
        $role='Chef Projet';
        $title='Projets';
        return view('projets',compact('role','title'));
    }
    
    
    public function Compte(){
        $role='Chef Projet';
        $title='Compte';
        return view('Compte',compact('role','title'));
    }
}