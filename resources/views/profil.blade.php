@extends('layouts.mainlayout')

@section('title', 'Profil')

@section('contenu')

<main class="container">
	<section class="row">
		<div class="col mt-5">
			<h1>
				Profil de : {{ Auth::user()->name }} {{ Auth::user()->infos_prenom }}
			</h1>
			<p>
				Nom : {{ Auth::user()->name }}
			</p>
			<p>
				Prénom : {{ Auth::user()->infos_prenom}}
			</p>

			<p>
				Téléphone facultatif: {{ Auth::user()->infos_tel_2 }} 
			{{-- }}	<a href=" {{ route('modificationprofil')  }} ">Modifier</a> --}}
			</p>
			<p>
				@foreach ( $adresse as $adr)
				Adresse : {{  $adr->infos_adresse }} 
			</p>
			<p> Ville : {{ $adr->infos_ville }} 
			</p>
			<p> Code postal : {{  $adr->infos_code_postal    }} <a href="{{-- {{route('/modificationprofil')}} --}}">Modifier</a>
			</p>
			@endforeach
			<p>
				Email : {{  Auth::user()->email   }}
			</p>
			<p>
				Numero de telephone : {{  Auth::user()->infos_numero_tel}}
			</p>
			<p>
				Date d'inscription : {{-- {{  \Carbon\Carbon::parse (Auth::user()->created_at)->format('d/m/Y')   }} --}}
				@php
				Carbon\Carbon::setLocale('fr');
				$moment = Carbon\Carbon::parse (Auth::user()->created_at); 
				$now = Carbon\Carbon::now();
				$diff = $moment->diffForHumans($now); 
				@endphp
				{{$diff}} 
			</p>
			<p>
				Points de fidélité : {{  Auth::user()->infos_nbre_crédits  }}
			</p>
		</div>


	</section>
</main>
@endsection