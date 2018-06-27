<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class adresseController extends Controller
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
            'infos_adresse' => 'required|string|max:255',
            'infos_prenom' => 'required|string|max:255',
            'infos_numero_tel' => 'required|max:15',
            //'infos_genre' => 'required',
            'infos_numero_tel_2' => 'max:15',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
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
            'email' => $data['email'],
            'infos_prenom' => $data['infos_prenom'],
            //'infos_genre' => $data['infos_genre'],
            'infos_numero_tel' => $data['infos_numero_tel'],
            'infos_numero_tel_2' => $data['infos_numero_tel_2'],
            'password' => Hash::make($data['password']),
        ]);

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