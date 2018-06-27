<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\usersModel as User;
use App\adresseModel as Adresse;
use App\devisModel as Devis;
use App\factureModel as Factures;


class adminController extends Controller
{
//affiche page comptage devis
public function accueil(){
    	if(Auth::User()->role == 4){
	        $devis = Devis::count();
	        $facture = Factures::count();
	        return view('admin.accueil',['devis' => $devis, 'facture' => $facture]);
    	}else{
    		return abort('404');
    	}
    }


//affiche page devis select client
	public function devis(){
		if(Auth::user()->role ==4 ){
			$nom = User::get();
			return view('admin.devis',['nom' => $nom]);
		}else{
			return abort('404');
		}
	}
 // ajout du devis pour facturation

    public function postdevis(Request $donnees){
    	if(Auth::user()->role ==4 ){
    		$validatedData = $donnees->validate([
				'client' => 'required',
				'datedevis' => 'required|date',
	 			'description' => 'required|max:255',
	 			'qte' => 'required|numeric',
	 			'tarif' => 'required',
	 			'reglement' => 'required'
	 		]);
	 		$idadresse = Adresse::where('users_id', $donnees['client'])->value('infos_id_Adresse');
	 		$devis = new Devis();
			$devis->users_id = $donnees['client'];
			$devis->Adresse_infos_id_Adresse = $idadresse;
			$date = date_create($donnees['datedevis']);
			$date = date_format($date,'Y-m-d');
			$devis->infos_date_expiration = $date;
			$devis->description = $donnees['description'];
			$devis->quantite = $donnees['qte'];
			$devis->infos_montant_devis = $donnees['tarif'];
			$devis->infos_reglement = $donnees['reglement'];
			$devis->save();
			return redirect()->back()->with('message', 'Votre devis a bien été crée avec succès !');
		}else{
			return abort('404');
		}
    }   

    	public function listedevis(){ 
		if(Auth::user()->role ==4){
			$listedevis = Devis::get();
			$listeusers = User::get();
			$listedevis = Devis::paginate(10);       	
			return view('admin.listedevis', ['listedevis' => $listedevis, 'listeusers' => $listeusers]);
		}else{
			return abort('404');
		}
	}

	// affiche la page modification du devis
	public function modificationdevis($id) {
		if(Auth::user()->role ==4){
			$listedevis = Devis::where('id_numero_Devis',$id)->first();   	
			return view('admin.modificationdevis', ['listedevis' => $listedevis]);
		}else{
			return abort('404');
		}
	}

 //modification du devis en post
	public function modifdevis(Request $donnees) {
		if(Auth::User()->role == 4){
			$validatedData = $donnees->validate([
				'description'=> 'required',
				'quantite' => 'required',
				'montant' => 'required',
				'datedevis' => 'required|date'
			]);
			
				$date = date_create($donnees['datedevis']);
				$date = date_format($date,'Y-m-d');

			Devis::where('id_numero_Devis', $donnees["id_numero_Devis"])->update([
				"description"=>$donnees['description'],
				"quantite"=> $donnees['quantite'],
				"infos_montant_devis"=> $donnees['montant'],
				"infos_date_expiration" => $date
				
			]);
		    	return redirect()->back()->with('message', 'Modification  du devis terminée avec succès');
		}else{
				return abort('404');
		}
 }

 	public function devisupprime($id) {
		if(Auth::user()->role ==4){
			Devis::where('id_numero_Devis', $id)->update(["infos_statut_devis" => 0]);
			return redirect()->back()->with('message', 'Le devis à été annulé !');
		}else{
			return abort('404');
		}
	}

}

