@extends('layouts.mainlayout')

@section('title', 'Profil')

@section('contenu')

<main class="container">
	<section class="row">
		<div class="col">
			<section class="col-12">
            <h1>
                Administration des devis
            </h1>
            {{-- message de validation --}}
            @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
            @endif           
            <h2>
                Devis
            </h2>
            <hr>
            {{-- formulaire --}}            
            <form method="post" action="{{route('postdevis') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                	<div class="col-6">
                		<p>logo brainytech</p>
                	</div>
                		<div class="col-6">
                			<p> numero du devis </p>
                		</div>
                </div>		
                <div class="row">
                 <div class="col-6">
                 	<p>Coordonnes du client ( rue code postal etc...)</p>
                 </div>		
                 <div class="col-6">
                 	<p> date devis </p>
                 </div>
             	</div>
                 <div class="row">
                 	<div class="col-8">
                 		<p> Description</p>
                 	</div>
                 	<div class="col-2">
                 		<p>Quantité</p>
            	</div>
            	<div class="col-2">
            		<p>Tarif HT</p>
            	</div>
            </div>

	</section>
</main>
@endsection