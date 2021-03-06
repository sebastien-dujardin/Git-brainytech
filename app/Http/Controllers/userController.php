<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel as User;
use App\adresseModel as Adresse;
use Carbon\Carbon;
use Auth;
use Image;

class userController extends Controller
{
    public function profil(){
    	return view('profil', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profil', array('user' => Auth::user()) );
    }

	public function modif(){
		$idadresse = Adresse::where('users_id', Auth::user()->id)->value('infos_id_Adresse');
		$coordonnes = Adresse::where('users_id', Auth::user()->id)->value('infos_adresse');
		$code = Adresse::where('users_id', Auth::user()->id)->value('infos_code_postal');
		$city = Adresse::where('users_id', Auth::user()->id)->value('infos_ville');
		return view('modifprofil', compact('coordonnes', 'code', 'city', 'idadresse')  );
	}

		  // valid modif profil
	 public function postmodif(Request $donnees) {

			$validatedData = $donnees->validate([
				'idadress' => 'required',
	 			'codepostal' => 'required|max:5',
	 			'ville' => 'required|max:255',
	 			'adresse' => 'required|max:255',
	 			'tel' => 'required|max:10'
	 		]);

	 		Adresse::where('infos_id_Adresse', $donnees["idadress"])->update([
	 			"infos_code_postal"=> $donnees['codepostal'],
	 			"infos_ville"=> $donnees['ville'],
	 			"infos_adresse"=> $donnees['adresse']
	 		]);
	 		User::where('id', Auth::user()->id)->update([
	 			"infos_numero_tel"=> $donnees['tel']
	 		]);
	 	    	return redirect()->back()->with('message', 'Modification terminée avec succès');
	 }


	 public function jeu(){
	 	$req = $db->query('SELECT * FROM users LIMIT 1');
	 	$users = $req->fetchObject();
	 	return view('jeu');
	 }
}