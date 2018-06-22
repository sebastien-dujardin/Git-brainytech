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

	
		 public function modif(Request $donnees) {
		$validateData = $donnees->validate([
			'contenu' => 'required',
			'type' => 'required',			
			'zone_id_zone' => 'required',			
			'publication_id_publication' => 'required',
		]);			  
	}
}
