<?php

namespace App\Http\Controllers;
class SecretaireController extends Controller
{
    
    public function showNotifications(){
        $role='Secretaire';
        $title='Notifications';
        return view('notification',compact('role','title'));
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
    public function Secretairecompte(){
        $role='Secretaire';
        $title='Compte';
        return view('compte',compact('role','title'));
    }
}