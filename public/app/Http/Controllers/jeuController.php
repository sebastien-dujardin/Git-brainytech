<?php

namespace App\Http\Controllers;
use App\usersModel as User;
use Illuminate\Http\Request;
use Auth;

class jeuController extends Controller
{
	   public function jeu(){

	   	return view('jeu');

	}

	public function jeu_ajout_point(Request $donnees){

			$infos_nbre_credits = User::where('users_id', Auth::user()->id)->value('infos_nbre_credits');
	 		
	 		$infos_nbre_credits = $infos_nbre_credits+$donnees['result'];

	 		User::where('id', Auth::user()->id)->update(["infos_nbre_credits"=> $infos_nbre_credits]);
	 	    	return redirect()->back()->with('message', 'Vous avez gagné des crédits.');
	 }

}
