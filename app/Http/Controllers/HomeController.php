<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\adresseModel as Adresse;
use App\devisModel as Devis;
use App\factureModel as Factures;
use Carbon\Carbon as Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     // affiche le formulaire changement mdp
    public function showChangePasswordFrom(){
        return view('auth.changepassword');
    }

    // Valide changement mdp
    public function changePassword(Request $request){
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))){
            // The password matches
            return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
        } 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Nouveau mot de passe ne peut pas être le même que votre mot de passe actuel. Veuillez choisir un mot de passe différent.");
        } 
        $validateData =$request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]); 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Le mot de passe a été changé avec succès !"); 
    }

public function listedevis(){ 
            $listedevis = Devis::where('users_id', Auth::user()->id)->paginate(5);
            // $listedevis = Devis::paginate(10);     
            // die(var_dump($listedevis));    
            return view('listedevis', ['listedevis' => $listedevis]);
    }

    public function devisvalide($id) {
            Devis::where('id_numero_Devis', $id)->update(["infos_statut_devis" => 2, "date_validation" => Carbon::now()]);
            return redirect()->back()->with('message', 'Le devis à été validé avec succès !');
    }

    public function devisupprime($id) {
            Devis::where('id_numero_Devis', $id)->update(["infos_statut_devis" => 0, "date_refus" => Carbon::now()]);
            return redirect()->back()->with('message', 'Le devis à été refusé avec succès !');
    }
}
