@extends('layouts.mainlayout')

@section('title', "Administration du site")

@section('contenu')

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
            <form method="post" action="{{route('modificationdevis') }}">
                {{ csrf_field() }}
                <input id="id_mairie" type="hidden" value="{{$devis->id}}" name="id_devis">
                {{--  description devis --}}
                <div class="form-group row">
                    <label for="devis" class="col-md-3 col-form-label text-md-right">
                        Description
                    </label>
                    <div class="col-md-8">
                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" type="text" name="description" id="description" value="{{$devis->description}}" required>
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
                        <input class="form-control{{ $errors->has('qte') ? ' is-invalid' : '' }}" type="text" name="qte" id="qte" value="{{$devis->quantite}}" required>
                        @if($errors->has('qte'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('qte') }}
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
                        <input class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" type="text" name="tarif" id="tarif" value="{{$devis->infos_montant_devis}}" required>
                        @if($errors->has('tarif'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('tarif') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- champ statut --}}
                <div class="form-group row">
                    <label for="statut" class="col-md-3 col-form-label text-md-right">
                        Statut
                    </label>
                    <div class="col-md-8">
                        <input class="form-control{{ $errors->has('statut') ? ' is-invalid' : '' }}" type="text" name="statut"  value="{{$devis->infos_statut_devis}}" required>
                        @if($errors->has('statut'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('statut') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>                
                {{-- bouton modofication --}}
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