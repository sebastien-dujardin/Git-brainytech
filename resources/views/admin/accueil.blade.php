@extends('layouts.adminlayout')
@section('title', "Administration du site")
@section('contenu')
<!-- Header -->
<header class="container">
    <div class="row">
        <div  class='col-12'>
            <h1>Administration du site</h1>
        </div>
    </div>
</header>
<!-- Content -->
<section class="container pb-4">
		<main class="row pt-3">
            <div class="col-12">
                <p>Page d'administration.</p>
            </div>
			<div class="card-columns">
				<div class="card">
					<div class="card-body">


						<h5 class="card-title">Devis :</h5>


						<p class="card-text"></p>
					</div>
					<div class="card-footer">
						 <p class="card-text"><small class="text-muted"><a href="{{URL::to('/')}}/admin/listedevis/">Administrer</a> - <a href="{{URL::to('/')}}/admin/devis/">Ajouter</a></small></p> 
					</div>
				</div>
				<div class="card">
					<div class="card-body">


						<h5 class="card-title">Factures :</h5>
						<p class="card-text"></p>
					</div>
					<div class="card-footer">
						<p class="card-text"><small class="text-muted"><a href="{{URL::to('/')}}/admin/listefacture/">Administrer</a></small></p>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Planning Calendrier</h5>
						<p class="card-text">Total RDV : </p>
						<p class="card-text">Demande : </p>


					</div>
					<div class="card-footer">
						<p class="card-text"><small class="text-muted"><a href="">Administrer</a></small></p>
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
