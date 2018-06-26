<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\adresseModel as Adresse;
use App\entrepriseModel as Entreprise;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;
    
    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/home';
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(){
        $this->middleware('guest');
    }
    
    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'infos_prenom' => 'required|string|max:255',
            'infos_numero_tel' => 'required|string|max:11',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'infos_adresse' => 'required|string|max:255',
            'infos_complement_adresse' => 'nullable|max:255',
            'infos_code_postal' => 'required|numeric|max:99999',
            'infos_ville' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'infos_siret' => 'nullable|max:14',
            'infos_adresse_entreprise' => 'nullable|max:255',
            'infos_nom_entreprise' => 'nullable|max:45',


        ]);
    }
    
    /**
        * Create a new user instance after a valid registration.
        *
        * @param  array  $data
        * @return \App\User
        */
    protected function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'infos_prenom' => $data['infos_prenom'],
            'infos_numero_tel' => $data['infos_numero_tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),


        ]);


        $adresse = Adresse::create([
            'infos_adresse' => $data['infos_adresse'],
            'infos_complement_adresse' => $data['infos_complement_adresse'],
            'infos_code_postal' => $data['infos_code_postal'],
            'infos_ville' => $data['infos_ville'],
            'users_id' => $user->id,
        ]);
        
        if (isset($data['choix']) && $data['choix'] == "on" )
        {
 
            
            $entreprise = Entreprise::create([
            'infos_adresse_entreprise' => $data['infos_adresse_entreprise'],
            'infos_siret' => $data['infos_siret'],
            'infos_nom_entreprise' => $data['infos_nom_entreprise'],
            'users_id' => $user->id,
           
            ]); 

        }

        
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);
        
        
        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
      
    }
    
    public function verifyUser($token){ 
        $verifyUser = VerifyUser::where('token', $token)->first(); 
        if(isset($verifyUser)){ 
            $user = $verifyUser->user; 
            if(!$user->verified){ 
                $verifyUser->user->verified = 1; 
                $verifyUser->user->save(); 
                $status = "Votre adresse e-mail est vérifiée. Vous pouvez maintenant vous connecter."; 
            }else{ 
                $status = "Votre adresse e-mail est déjà vérifiée. Vous pouvez maintenant vous connecter." ; 
            } 
        }else{ 
            return redirect('/login')->with('warning', "Désolé, votre email ne peut pas être identifié."); 
        }                    
        return redirect('/login')->with('status', $status); 
    } 

    protected function registered(Request $request, $user){
        $this->guard()->logout();
        return redirect('/login')->with('status', "Nous vous avons envoyé un code d'activation. Vérifiez votre email et cliquez sur le lien pour vérifier.");
    }
}
