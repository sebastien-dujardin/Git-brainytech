@extends('layouts.mainlayout')

@section('title', "Administration du site")

@section('contenu')
{{-- instanciation de jquery et jquery-ui pour modif date --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.min.css')}}">
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scripts.js')}}"></script>
<script>
  $( function() {
    $( "#datepick" ).datepicker();
  } );
  </script>
{{--  header  --}}
<header class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Administration du site 
            </h1>
        </div>
    </div>
</header>
{{--  contenu  --}}
<section class="container pb-4">
    <main class="row pt-3">
        <div class="col-12">
            {{-- message de validation --}}
            @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
            @endif           
            <h2>
                Modifier un devis
            </h2>
        </div>
        <div class="col-12">
            {{-- formulaire --}}            
            <form method="post" action="{{route('modifdevis') }}">
                {{ csrf_field() }}
                <input id="id_numero_Devis" type="hidden" value="{{$listedevis->id_numero_Devis}}" name="id_numero_Devis">
                {{--  description devis --}}
                <div class="form-group row">
                    <label for="devis" class="col-md-3 col-form-label text-md-right">
                        Description
                    </label>
                    <div class="col-md-8">
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" type="text" name="description" id="description" required>{{$listedevis->description}}</textarea>
                        @if($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('description') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- champ quantité devis --}}
                <div class="form-group row"> 
                    <label for="quantite" class="col-md-3 col-form-label text-md-right" >
                        Quantité
                    </label>
                    <div class="col-md-8">
                        <input class="form-control{{ $errors->has('quantite') ? ' is-invalid' : '' }}" type="text" name="quantite" id="quantite" value="{{$listedevis->quantite}}" required>
                        @if($errors->has('quantite'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('quantite') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{--  montant devis  --}}
                <div class="form-group row">
                    <label for="montant" class="col-md-3 col-form-label text-md-right">
                        Montant
                    </label>
                    <div class="col-md-8">
                        <input class="form-control{{ $errors->has('montant') ? ' is-invalid' : '' }}" type="text" name="montant" id="montant" value="{{$listedevis->infos_montant_devis}}" required>
                        @if($errors->has('montant'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('montant') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- date expîration  --}}
            <div class="form-group row">
                    <label for="date" class="col-md-3 col-form-label text-md-right">
                        Date expiration
                    </label>
                    <div class="col-md-8">
                        @php
                        $dex = date_create($listedevis->infos_date_expiration);
                        $dex = date_format($dex,'d-m-Y');
                       @endphp
                       <input type="text" name="datedevis" id="datepick"value="
                       {{$dex}}" required>
                        @if($errors->has('datedevis'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('datedevis') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>

                {{-- bouton modification --}}
                <div class="form-group row pb-3">
                    <div class="col-md-6 offset-md-3">                    
                        <button class="btn btn-primary" type="submit">
                            Modifier le devis
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</section>
@endsection