<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\devController;
use App\Http\Controllers\chefProjetController;
use App\Http\Controllers\choiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', [loginController::class , 'login' ])->name('login');
Route::get('/choice', [choiceController::class , 'choice' ])->name('choice');
Route::get('/Secretaire/notification', [SecretaireController::class , 'showNotifications' ])->name('Secretairenotification');
Route::get('/Secretaire/reunions', [SecretaireController::class , 'showReunions' ])->name('Secretairereunions');
Route::get('/Secretaire/compte', [SecretaireController::class , 'Secretairecompte' ])->name('Secretairecompte');
Route::get('/Secretaire/historique', [SecretaireController::class , 'Historique' ])->name('Secretairehistorique');

Route::get('/Admin/notification', [AdminController::class , 'showNotifications' ])->name('Adminnotification');
Route::get('/Admin/reunions', [AdminController::class , 'showReunions' ])->name('Adminreunions');
Route::get('/Admin/equipes', [AdminController::class , 'showEquipes' ])->name('Adminequipes');
Route::get('/Admin/historique', [AdminController::class , 'showHistorique' ])->name('Adminhistorique');
Route::get('/Admin/compte', [AdminController::class , 'Compte' ])->name('Admincompte');

Route::get('/Admin/projets', [AdminController::class , 'GererProjets' ])->name('Adminprojets');

Route::get('/chefProjet/notification', [chefProjetController::class , 'showNotifications' ])->name('Chef Projetnotification');
Route::get('/chefProjet/compte', [chefProjetController::class , 'Compte' ])->name('Chef Projetcompte');
Route::get('/chefProjet/projets', [chefProjetController::class , 'showProjets' ])->name('Chef Projetprojets');

Route::get('/developpeur/notification', [devController::class , 'showNotifications' ])->name('Developpeurnotification');
Route::get('/developpeur/compte', [devController::class , 'Compte' ])->name('Developpeurcompte');
Route::get('/developpeur/projets', [devController::class , 'showProjets' ])->name('Developpeurprojets');
Route::get('/developpeur/projets/suivre', [devController::class , 'suivre' ])->name('Developpeursuivreprojet');