<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class gererTache extends Controller
{
    public function ajouterTache(Request $request){
        $user=Session::get('user');
        $dev= User::where('name','=', $request-> input('responsable'))
              ->first();
      $request->validate(
          [
              'nomTache' => 'required',
              'responsable' => 'required'
             
         ]
      );

       $query= DB::table('tache')->insert([
          'intituleTache' => $request-> input('nomTache'),
          'devId' =>  $dev->id,
          'projetID' =>  $request-> input('projetID')
          

       ]);
       if($query){
       
         return back()-> with('success','la tache a été bien ajoutée :)') ;
       }else{
        return back()-> with('fail','veuillez reessayer! ce n est pas bien passé') ;
       
    }

}public function destroy(Request $request){
    
       $id= $request-> input('tacheid');
       $query=DB::table('tache')->where('id', '=', $id)->delete();
      
        if($query){
           return back()-> with('success','le tache a été bien  annulée :)') ;
         
        }else{
           return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
        }
           
          
       }

}