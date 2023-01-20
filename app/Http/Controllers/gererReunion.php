<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Controllers\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class gererReunion extends Controller
{

    public function ajouterReunion(Request $request){
      $request->validate(
          [
              'objet' => 'required',
              'date' => 'required',
              'heure' => 'required',
              'client' => 'required'
             

          ]
      );
       $query= DB::table('reunion')->insert([
          'objetReunion' => $request-> input('objet'),
          'dateReunion' => $request-> input('date'),
          'heureReunion' => $request-> input('heure'),
          'client' => $request-> input('client'),
          'contactClient' => $request-> input('tel')

       ]);
       
     /* $diff =DateTime::createFromFormat("Y-m-d",$request-> input('date'))->diff(DateTime::createFromFormat("Y-m-d",date("Y-m-d")))->format("%a");
       if($diff>=2){
           $important='normal';
        
       }else{
        $important='urgent';
       }*/ $important='urgent';
       if($query){
        $user=Session::get('user');
        DB::table('notification')->insert([
            'objet' => 'reunion',
            'responsable' =>$user->name,
            'action'=>'a programmé une réunion le '. $request-> input('date'),
            'dateAjout' => date("Y-m-d"),
            'importance' => 'important'
            
  
         ]);
         return back()-> with('success','la reunion a été bien programmée :)') ;
       }else{
        return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
       
    }
}  public function destroy(Request $request){
    
     $id=$request-> input('reunionid');
        $user=Session::get('user');
     
         $query=DB::table('reunion')->where('idReunion', '=', $id)->delete();
        
         if($query){
            return back()-> with('success','la reunion a été bien  annulée :)') ;
            DB::table('notification')->insert([
                'objet' => 'reunion',
                'responsable' =>$user->name,
                'action'=>'a annulé une réunion ',
                'dateAjout' => date("Y-m-d"),
                'importance' => 'annulation'
                
      
             ]);
         }else{
            return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
         }
            
           
        }

        public function modifier(Request $request){
            $request->validate(
                [
                    'objet' => 'required',
                    'date' => 'required',
                    'heure' => 'required',
                    'client' => 'required' ,
                    'contact'  => 'required'
      
                ]
            );
            $user=Session::get('user');
            $id=$request-> input('reunionid');
            $objet=$request-> input('objet');
            $date=$request-> input('date');
            $heure=$request-> input('heure');
            $client=$request-> input('client');
            $tel=$request-> input('contact');
            $query=DB::table('reunion')
            ->where('idReunion', '=', $id)
            ->update(
                [
                    'objetReunion' => $objet,
                    'dateReunion' => $date,
                    'heureReunion' => $heure,
                    'client'=> $client,
                    'contactClient' => $tel
                ]
            );
            if($query){
               /* $email=$user->email;
                $name=DB::table('users') ->where('email','=',$email)->select('name')->value();
                DB::table('notification')->insert([
                    'objet' => 'reunion',
                    'responsable' =>$name,
                    'action'=>'a modifié les informations de la réunion '.$request-> input('objet'). ' Avec '.$request-> input('client') ,
                    'dateAjout' => date("Y-m-d"),
                    'importance' => 'modification'
                    
          
                 ]);*/
                 return back()-> with('success','la reunion a été bien  modifiée :)') ;
             }else{
                return back()-> with('fail','veuillez reessayer! ce n\'est pas bien passé') ;
             }
        }
}
