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


//Connexion au profil
Route::get('/utilisateur', 'userController@profil')->middleware('auth')->name('profil');
//Modification profil
Route::post('/modificationprofil', 'userController@modif')->middleware('auth')->name('modif');
// Activation compte par mail
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
// affiche vue changement mdp
Route::get('/changePassword', 'HomeController@showChangePasswordFrom');
// valide changement mdp
Route::post('changePassword', 'HomeController@changePassword')->name('changePassword');

//Route footer 
Route::get('/vieprivee', 'footercontroller@vieprivee')->name('vieprivee');
Route::get('/mentionslegales', 'footercontroller@mentionslegales')->name('mentionslegales');
Route::get('/Conditions', 'footercontroller@conditions')->name('conditions');
Route::get('/sitemap', 'footercontroller@sitemap')->name('sitemap');
Route::get('/contact', 'footercontroller@contact')->name('contact');
Route::get('/quisommesnous', 'footercontroller@quisommesnous')->name('quisommesnous');
Route::get('/infospratiques', 'footercontroller@infospratiques')->name('infospratiques');
Route::get('/partenaires', 'footercontroller@partenaires')->name('partenaires');
Route::get('/confidentialite', 'footercontroller@confidentialite')->name('confidentialite');
Route::get('/faqs', 'footercontroller@faqs')->name('faqs');
Route::get('/commentcamarche', 'footercontroller@commentcamarche')->name('commentcamarche');
Route::get('/presse', 'footercontroller@presse')->name('presse');
Route::get('/cookies', 'footercontroller@cookies')->name('cookies');
Route::get('/assurance', 'footercontroller@assurance')->name('assurance');
Route::get('/conseil', 'footercontroller@conseil')->name('conseil');

// Route Admin
Route::prefix('admin')->group(function() {
// Route accueil admin 
	Route::get('/', 'adminController@accueil')->middleware('auth')->name('admin');
	Route::get('/', 'adminController@devis')->middleware('auth')->name('devis');
	Route::get('/', 'adminController@postdevis')->middleware('auth')->name('postdevis');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



