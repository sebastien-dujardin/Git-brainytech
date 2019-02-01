<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title') - {{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fichier JS -->
	<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.ui.datepicker-fr.js')}}"></script>
  
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>		
	<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
	
	<!-- Fichier CSS -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
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
					{{-- @if(Auth::user()->role == 4) --}}
					{{-- lien admin si role 4 --}}
					{{-- <li class="nav-item{{ (Route::getCurrentRoute()->getPrefix() == '/admin') ? ' active': ''}}">
						<a class='nav-link' href="{{ route('admin')}}">
							{{ __('Admin') }}
						</a>
					</li>
					@endif --}}
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; color:white; padding-left:50px;">
                                <img src="{{ asset('uploads/avatars/')}}/{{Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; left:10px; border-radius:55% !important; top:-9px">
                                </a> 
                              <span style="color: white"> {{ Auth::user()->name }} {{ Auth::user()->infos_prenom }} </span><span class="caret"></span>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							{{-- lien profil --}}
							<a class="dropdown-item" href="{{ route('profil') }}">
								<i class="fas fa-user"></i> {{{ __('Profil') }}}
							</a>


							{{-- lien jeu --}}
							{{-- <a class="dropdown-item" href="{{ route('jeu') }}">
								{{ __('Jeu') }}
							</a> --}}
							<div class="dropdown-divider"></div>
							{{-- lien changement mdp --}}
							<a class="dropdown-item" href="{{ route('changePassword') }}">
           						</i>{{ __('Change Password') }}
							</a>
							<div class="dropdown-divider"></div>

							{{-- lien logout --}}
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"> 
								</i> {{ __('Déconnexion') }}
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
