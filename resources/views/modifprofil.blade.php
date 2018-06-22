@extends('layouts.mainlayout')

@section('title', 'Profil')

@section('contenu')

<header class="container">
	<div class="row">
		<div class="col-12">
			@if(session('message'))
			<div class="alert alert-success text-center">
				{{ session('message') }}
			</div>
			@endif
			<h1>
				Modifier votre profil
			</h1>
		</div>
	</div>
</header>
{{-- contenu --}}
<main class="container">
	<section class="row">
		<div class="col-12 mb-5">
			<h2>
				Profil de : {{ Auth::user()->name }} {{ Auth::user()->infos_prenom }}
			</h2>
			<hr>
			<form method="post" action="{{route('modificationprofil')}}" enctype="miltipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					{{-- telephone --}}
					<div class="col-4 mb-2 text-right">
						<label for="tel" class="form-label">
							Telephone 
						</label>
					</div>
					<div class="col-8 mb-2">
						<input class="form-control{{ $errors->has('infos_numero_tel') ? ' is-invalid' : '' }}" type="text" name="tel" id="tel" value="{{ Auth::user()->infos_numero_tel }}" required>
						@if($errors->has('titre'))
						<span class="invalid-feedback">
							<strong>
								{{ $errors->first('infos_numero_tel') }}
							</strong>
						</span>
						@endif
					</div>
					<div class="col-4 mb-2 text-right">
						<label for="adresse" class="form-label">
							Adresse
						</label>
					</div>
					<div class="col-8 mb-2">
						<input class="form-control{{ $errors->has('infos_adresse') ? ' is-invalid' : '' }}" type="text" name="adresse" id="adresse" value="{{ Adresse()->infos_adresse}}" required>
						@if($errors->has('titre'))
						<span class="invalid-feedback">
							<strong>
								{{ $errors->first('infos_adresse') }}
							</strong>
						</span>
						@endif
					</div>
					{{-- code postal --}}
					<div class="col-4 mb-2 text-right">
						<label for="codepostal" class="form-label">
							Code postal
						</label>
					</div>
					<div class="col-8 mb-2">
						<input class="form-control{{ $errors->has('infos_code_postal') ? ' is-invalid' : '' }}" type="text" name="codepostal" id="codepostal" value="{{ Adresse()->infos_code_postal}}" required>
						@if($errors->has('titre'))
						<span class="invalid-feedback">
							<strong>
								{{ $errors->first('infos_code_postal') }}
							</strong>
						</span>
						@endif
					</div>
						<div class="col-4 mb-2 text-right">
						<label for="ville" class="form-label">
							Ville
						</label>
					</div>
					<div class="col-8 mb-2">
						<input class="form-control{{ $errors->has('infos_ville') ? ' is-invalid' : '' }}" type="text" name="ville" id="codepostal" value="{{ Adresse()->infos_ville}}" required>
						@if($errors->has('titre'))
						<span class="invalid-feedback">
							<strong>
								{{ $errors->first('infos_ville') }}
							</strong>
						</span>
						@endif
					</div>
					<hr>
					{{-- validation modifications --}}
					<div class="col-4 mb-2"></div>
					<div class="col-8">
						<button type="submit" class="btn btn-primary">
							valider
						</button>
						<a href="{{route('utilisateur')}}" type="button" class="btn btn-secondary">
							Annuler
						</a>
					</div>
				</div>
			</form>
		</div>
	</section>
</main>

@endsection