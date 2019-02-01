<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="desc" />
  <meta name="keywords" content="keyword" />
  <meta charset="utf-8">
  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fichier JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>   
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Fichier CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/scripts.js') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

        
<body>

  <div class="header" action="{{route('jeu')}}">
 <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo mr-auto">Casino</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{route('jeu')}}">Home</a></li>
        <li><a href="mobile.html">Jeux de grattages</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="{{route('jeu')}}">Home</a></li>
        <li><a href="mobile.html">Jeux de grattages</a></li>
      </ul>
    </div>
  </nav>
</div>          

</body>
</html>

