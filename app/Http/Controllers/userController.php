<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;


class usersController extends Controller
{

    public function profil(){
    	return view('profil');
    }


    public function modif(Request $donnees){
        
        
        $id = Auth::User()->iduser;
                $validedata = $donnees->validate([
                    'infos_numero_tel_2' => 'required|number_format|max:15']);
        $password = Hash::make($donnees['password']);
   
        User::where('id', $id)->update([
        	'infos_numero_tel_2' => ($donnees['infos_numero_tel_2'])
        ]);

        return view('modifprofil')->with('message', 'Votre profil a été modifié avec succès');

    }
}
