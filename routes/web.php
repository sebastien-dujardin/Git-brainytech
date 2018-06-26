<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Routes 

//Routes Utilisateur

//Inscription bis formulaire 2
Route::post('/utilisateur', 'RegisterContoller@postadresse')->middleware('auth')->name('modif');
//Connexion au profil
Route::get('/utilisateur', 'userController@profil')->middleware('auth')->name('profil');
//Modification profil
Route::post('/modificationprofil', 'userController@modif')->middleware('auth')->name('modif');
// Activation compte par mail
Route::get('/user/verify/{token}', 'Auth\RegisterContoller@verifyUser');
// affiche vue changement mdp
Route::get('/changePassword', 'HomeController@showChangePasswordFrom');
// valide changement mdp
Route::post('changePassword', 'HomeController@changePassword')->name('changePassword');

//Route footer 
Route::get('/vieprivee', 'footercontroller@vieprivee')->name('vieprivee');
Route::get('/mentionslegales', 'footercontroller@mentionslegales')->name('mentionslegales');
Route::get('/Conditions', 'footercontroller@conditions')->name('conditions');
Route::get('/contact', 'footercontroller@contact')->name('contact');
Route::get('/quisommesnous', 'footercontroller@quisommesnous')->name('quisommesnous');



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
