<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title') - {{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fichier JS -->
	<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>		
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
	<!-- Fichier CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.min.css') }}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light  bg-light">
		<section class="container">
			{{-- lien sur logo --}}
			<a class="navbar-brand" href="{{ URL::to('/') }}">
				{{-- logo --}}
				<!-- <img src=""> -->
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					@guest
					{{-- lien Accueil --}}
					<li class="nav-item{{ (Route::currentRouteName() == 'home') ? ' active': '' }}">
						<a class="nav-link" href="{{URL::to('/')}}">
							{{ __('Home')}}
							<span class="sr-only">(current)</span>
						</a>
					</li>
					@else
					
					<li class="nav-item{{ (Route::currentRouteName() == 'home') ? ' active': '' }}">
						<a class="nav-link" href="{{URL::to('/home')}}">
							{{ __('Home')}}
							<span class="sr-only">(current)</span>
						</a>
					</li>
					
					@endguest
					
				</ul>
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					{{-- lien login --}}
					<li class="nav-item{{(Route::currentRouteName() == 'login') ? ' active': ''}}">
						<a class="nav-link" href="{{ route('login') }}">
							{{ __('Login') }}
						</a>
					</li>
					{{-- lien register --}}
					<li class="{{(Route::currentRouteName() == 'register') ? ' active': ''}}">
						<a class="nav-link" href="{{ route('register') }}">
							{{ __('Register') }}
						</a>
					</li>
					@else
					@if(Auth::user()->role == 4)
					{{-- lien admin si role 4 --}}
					<li class="nav-item{{ (Route::getCurrentRoute()->getPrefix() == '/admin') ? ' active': ''}}">
						<a class='nav-link' href="{{ route('admin')}}">
							{{ __('Admin') }}
						</a>
					</li>
					@endif
					<li class="nav-item dropdown">
						{{-- lien menu déroulant --}}
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} 
							<span class="caret"></span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							{{-- lien profil --}}
							<a class="dropdown-item" href="{{ route('profil') }}">
								{{ __('Profil') }}
							</a>
							{{-- lien changement mdp --}}
							<a class="dropdown-item" href="{{ route('changePassword') }}">
           						 {{ __('Change Password') }}
							</a>
							{{-- lien logout --}}
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Déconnexion') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</section>
	</nav>
