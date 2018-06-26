<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\usersModel as User;
use App\adresseModel as Adresse;
use App\devisModel as Devis;


class adminController extends Controller
{

public function accueil(){
    	if(Auth::User()->role == 4){
	        $devis = Devis::count();
	        return view('admin.accueil',['devis' => $devis]);
    	}else{
    		return abort('404');
    	}
    }


//affiche page devis
	public function devis(){
		if(Auth::user()->role ==4 ){
			$nom = User::get();
			return view('admin.devis',['nom' => $nom]);
		}else{
			return abort('404');
		}
	}
    
}