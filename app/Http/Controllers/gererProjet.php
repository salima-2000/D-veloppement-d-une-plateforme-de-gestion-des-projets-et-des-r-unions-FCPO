<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class gererProjet extends Controller
{

    public function ajouterProjet(Request $request){
        $user=Session::get('user');
      $request->validate(
          [
              'intitule' => 'required',
              'deadline' => 'required',
              'equipe' => 'required',
              'client' => 'required',
              'chefProjet'  => 'required',
              'descriptif' => 'required'
             

          ]
      );

       $query= DB::table('projet')->insert([
          'intituleProjet' => $request-> input('intitule'),
          'deadline' => $request-> input('deadline'),
          'equipeID' => $request-> input('equipe'),
          'chefProjet'=> $request-> input('chefProjet'),
          'description'  => $request-> input('descriptif'),
          'client' => $request-> input('client')

       ]);
       $diff =DateTime::createFromFormat("Y-m-d",$request-> input('deadline'))->diff(DateTime::createFromFormat("Y-m-d",date("Y-m-d")))->format("%a");
       if($diff>=30){
           $important='normal';
        
       }else{
        $important='urgent';
       }
       if($query){
        DB::table('notification')->insert([
            'objet' => 'projet',
            'responsable' =>$user->name,
            'dateAjout' => date("Y-m-d"),
            'action'=> 'a ajouté un projet sous l\'intitulé '.$request-> input('intitule'),
            'importance' => $important
            

        ]);
         return back()-> with('success','le projet a été bien ajouté :)') ;
       }else{
        return back()-> with('fail','veuillez reessayer! ce n est pas bien passé') ;
       
    }
}  public function destroy(Request $request){
    
    $id=$request-> input('projetid');
       $user=Session::get('user');
        DB::table('tache')->where('projetID', '=', $id)->delete();
        $query=DB::table('projet')->where('id', '=', $id)->delete();
       
        if($query){
           return back()-> with('success','le projet a été bien  annulé :)') ;
           DB::table('notification')->insert([
               'objet' => 'projet',
               'responsable' =>$user->name,
               'action'=>'a annulé un projet ',
               'dateAjout' => date("Y-m-d"),
               'importance' => 'annulation'
               
     
            ]);
        }else{
           return back()-> with($id.'fail','veuillez reessayer! ce n\'est pas bien passé') ;
        }
           
          
       }
       public function modifier(Request $request){
        $user=Session::get('user');
        $id=$request-> input('projetid');
        $objet=$request-> input('intitule');
        $date=$request-> input('deadline');
        $equipe=$request-> input('equipe');
        $client=$request-> input('client');
        $chefProjet=$request-> input('chefProjet');
        $descriptif=$request-> input('descriptif');
        $query=DB::table('projet')
        ->where('id', '=', $id)
        ->update(
            [
                'intituleProjet' => $objet,
                'deadline' => $date,
                'equipeID' => $equipe,
                'client'=> $client,
                'chefProjet' => $chefProjet,
                'description'  => $descriptif
            ]
        );
        if($query){
            return back()-> with('success','la reunion a été bien  modifiée :)') ;
            DB::table('notification')->insert([
                'objet' => 'projet',
                'responsable' =>$user->name,
                'action'=>'a modifié les informations du projet '. $objet,
                'dateAjout' => date("Y-m-d"),
                'importance' => 'modification'
                
      
             ]);
         }else{
            return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
         }
    }

}