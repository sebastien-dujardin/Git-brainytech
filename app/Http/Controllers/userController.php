<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel as User;
use App\adresseModel as Adresse;
use Carbon\Carbon;

class userController extends Controller
{
    public function profil(){
    	$adresse = Adresse::get();  
		 return view('profil', ['adresse' => $adresse]);
	}

	
		 // valid modif profil
	public function modif(Request $donnees) {

			$validatedData = $donnees->validate([
				'infos_code_postal' => 'required|max:5|numeric',
				'infos_ville' => 'required|max:255',
				'infos_adresse' => 'required|max:255',
				'infos_numero_tel' => 'required|max:10|numeric'
			]);
			
			Adresse::where('infos_id_Adresse', $donnees["infos_id_Adresse"])->update([
				"infos_code_postal"=> $donnees['infos_code_postal'],
				"infos_ville"=> $donnees['infos_ville'],
				"infos_adresse"=> $donnees['infos_adresse'],
				"infos_numero_tel"=> $donnees['infos_numero_tel']
			]);
		    	return redirect()->back()->with('message', 'Modification terminée avec succès');
	}
}
