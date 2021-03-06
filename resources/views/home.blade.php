@extends('layouts.adminlayout')
@section('title', "Administration du site")
@section('contenu')
<!-- Header -->
<header class="container">
    <div class="row">
        <div  class='col-12'>
            <h1>Accueil</h1>
        </div>
    </div>
</header>
<!-- Content -->
<section class="container pb-4">
        <main class="row pt-3">
            <div class="col-12">
                <p>Bonjour {{ Auth::user()->infos_prenom }} {{ Auth::user()->name}} ! bienvenue dans votre espace personnalises</p>
            </div>
            <div class="card-columns">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Devis :</h5>
                        <p class="card-text">{{$devis}}</p>
                    </div>
                    <div class="card-footer">
                          <p class="card-text"><small class="text-muted"><a href="{{URL::to('/')}}/listedevis/">Voir</a></small></p>  
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Factures :</h5>
                        <p class="card-text">{{$facture}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted"><a href="{{URL::to('/')}}/listefacture/">Voir</a></small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Planning Calendrier</h5>
                        <p class="card-text">Total RDV : </p>
                        <p class="card-text">Demande : </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted"><a href="{{URL::to('/')}}/calendrier/">Administrer</a></small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Stockage des fichiers</h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted"><a href="{{-- {{route('')}} --}}">Administrer</a></small></p>
                    </div>
                </div>
            </div>
        </main>
</section>
@endsection
