<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usersModel as User;
use Carbon\Carbon;

class userController extends Controller
{
    public function profil(){

		return view('profil');
	}
}
