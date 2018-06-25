<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel as User;
use App\adresseModel as Adresse;
use App\devisModel as Devis;

class AdminController extends Controller
{
   public function devis(){
   	$idadresse = Adresse::where('users_id', Auth::user()->id)->value('infos_id_Adresse');
		$coordonnes = Adresse::where('users_id', Auth::user()->id)->value('infos_adresse');
		return view('modifprofil', compact('coordonnes',  'idadresse')  );
   }
}
