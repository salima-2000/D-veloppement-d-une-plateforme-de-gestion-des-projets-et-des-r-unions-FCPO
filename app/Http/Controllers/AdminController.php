<?php

namespace App\Http\Controllers;
class AdminController extends Controller
{
    

    public function showNotifications(){
        $role='Admin';
        $title='Notifications';
        return view('notification',compact('role','title'));
    }
    public function GererProjets(){
        $role='Admin';
        $title='Projets';
        return view('projets',compact('role','title'));
    }
    public function showHistorique(){
        $role='Admin';
        $title='historique';
        return view('historique',compact('role','title'));
    }
    public function showEquipes(){
        $role='Admin';
        $title='Equipes';
        return view('equipes',compact('role','title'));
    }
    public function showProfil(){
        $role='Admin';
        $title='Equipes';
        return view('ProfilMembre',compact('role','title'));
    }
    public function showReunions(){
        $role='Admin';
        $title='Réunions';
        return view('reunions',compact('role','title'));
    }
    
    public function Compte(){
        $role='Admin';
        $title='Compte';
        return view('Compte',compact('role','title'));
    }
}