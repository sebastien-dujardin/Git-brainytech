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

// Route calendrier
Route::resource('events', 'EventsController');
Route::get('/calendrier',function () {
    return view('calendrier');
});

Auth::routes();




//Routes 

//Routes Utilisateur

//Inscription bis formulaire 2
Route::post('/utilisateur', 'RegisterController@postadresse')->middleware('auth')->name('modif');

//Connexion au profil
Route::get('profil', 'UserController@profil')->middleware('auth')->name('profil');
//post avatar
Route::post('profil', 'UserController@update_avatar');
//Modification profil
Route::get('/modifprofil', 'userController@modif')->middleware('auth')->name('modif');
Route::post('/postmodifprofil', 'userController@postmodif' )->middleware('auth')->name('postmodif');             

Route::get('profil', 'UserController@profil')->middleware('auth')->name('profil');
Route::post('profil', 'UserController@update_avatar');

// Activation compte par mail
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
// affiche vue changement mdp
Route::get('/changePassword', 'HomeController@showChangePasswordFrom');
// valide changement mdp
Route::post('changePassword', 'HomeController@changePassword')->name('changePassword');

Route::get('/listedevis', 'HomeController@listedevis')->middleware('auth')->name('listedevis');
Route::get('/devisupprime/{id}', 'HomeController@devisupprime')->middleware('auth')->name('devisupprime');
Route::get('/devisvalide/{id}/{regle}', 'HomeController@devisvalide')->middleware('auth')->name('devisvalide');
Route::get('/listefacture', 'HomeController@listefacture')->middleware('auth')->name('listefacture');



//Route footer 
Route::get('/mentionslegales', 'footercontroller@mentionslegales')->name('mentionslegales');
Route::get('/contact', 'footercontroller@contact')->name('contact');


// Route Admin
Route::prefix('admin')->group(function() {
// Route accueil admin 
	Route::get('/', 'adminController@accueil')->middleware('auth')->name('admin');
	Route::get('devis', 'adminController@devis')->middleware('auth')->name('devis');
	Route::post('/postdevis', 'adminController@postdevis')->middleware('auth')->name('postdevis');

	Route::get('/listedevis', 'adminController@listedevis')->middleware('auth')->name('listedevis');
	Route::get('/modificationdevis/{id}', 'adminController@modificationdevis')->middleware('auth')->name('modificationdevis');
	Route::post('/modifdevis', 'adminController@modifdevis')->middleware('auth')->name('modifdevis');
	Route::get('/devisupprime/{id}', 'adminController@devisupprime')->middleware('auth')->name('devisupprime');
	Route::get('/listefacture', 'adminController@listefacture')->middleware('auth')->name('listefacture');
	

});

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('admin.accueil');