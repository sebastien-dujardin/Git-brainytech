@extends('layouts.mainlayout')

@section('title', 'Profil')

@section('contenu')


<script type="text/javascript" src="{{ asset('assets/js/part3.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<main>        
	<body>
		{{Auth::user()->id}}
		<div class="container"> 
			<div class="jumbotron text-center">
				<h3>Le prix de la vitrine est entre 0 et <span class="prixMax">20</span>.</h3>
				<h1 class="chrono">30</h1>
				<h2 class="secondes">Secondes</h2>
				<h2 class="reponse">Trouvez le Juste Prix !</h2>
				<form id="paris" class="form-inline" role="form">
					<input type="text" class="form-control" id="nombre" placeholder="Entrez un nombre" autocomplete="off">
					<button type="button" class="btn btn-default">Parier !</button>
				</form>
				<button id="commencer" class="btn btn-large btn-danger">Commencer !</button>
				<form method="post" action="{{ route('jeu_ajout_point') }}">
					{{ csrf_field() }}
					<input type="hidden" name="result" id="result" value="">
				<button type="submit" id="valid_gain" class="btn btn-large btn-danger" style="display: none">Valide mes gains !</button>
			</form>
			</div>
		</div>


	</body>
</main>

@endsection
