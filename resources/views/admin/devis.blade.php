@extends('layouts.mainlayout')

@section('title', 'Profil')

@section('contenu')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.min.css')}}">
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js')}}"></script>


<script type="text/javascript" src="{{ asset('assets/js/scripts.js')}}"></script>


<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<main class="container">
	<section class="row">
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
                
            <img class="img-fluid mb-5" src="{{asset("assets/img/logo.jpg")}}">
            
                <div class="row">
                 <div class="col-6">
                  <select id="client" class="form-control{{ $errors->has('users_id') ? ' is-invalid' : '' }}" name="client" required>
                            {{--  selection des  client --}}
                            
                            <option value="">
                                -- Sélectionner un client --
                            </option>
                            @foreach ($nom as $nm)
                            <option value="{{$nm->id}}">
            						{{$nm->name.' '.$nm->infos_prenom}}
                            </option>
                            @endforeach
                        </select>
                         @if ($errors->has('role'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                 </div>		
                 <div class="col-6">
                 	<p>Date expiration: <input type="text" name="datedevis" id="datepicker"></p>
                 </div>
             	</div>
             	<div class="row">
             		<div class="col-12 mb-2">
             			<label for="description" class="form-label">
							Description
						</label>
						<div class="form-group">
    					<textarea class="form-control" name="description" id="description" rows="3"></textarea>
  					</div>
             		</div>
             	</div>
             	<div class="row">
              		<div class="col-6 mb-2 text-center">
						<label for="qte" class="form-label">
							Quantité
						</label>
						<br>
						<input class="form-control{{ $errors->has('quantité') ? ' is-invalid' : '' }}" type="text" name="qte" id="qte" value="{{ old('quantité') }}" required>
                        @if($errors->has('quantité'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('quantité') }}
                            </strong>
                        </span>
                        @endif
					</div>
            		<div class="col-6 mb-2 text-center">
            			<label for="tarif" class="form-label">
            				Tarif HT
            			</label>
            			<br>
            			<input class="form-control{{ $errors->has('infos_montant_devis') ? ' is-invalid' : '' }}" type="text" name="tarif" id="tarif" value="{{ old('infos_montant_devis') }}" required>
                        @if($errors->has('infos_montant_devis'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('infos_montant_devis') }}
                            </strong>
                        </span>
                        @endif
            		</div>
            	</div>
        		<div class="row">
        			<div class="col-md-2"></div>
    				{{-- <div class="form-check form-check-inline col-md-2">
    					<input class="form-check-input" type="radio" name="reglement" id="reglement" value="1">
    					<label class="form-check-label" for="reglement">50%</label>
    				</div>
    				<div class="col-md-4"></div>
    				<div class="form-check form-check-inline col-md-2">
    					<input class="form-check-input" type="radio" name="reglement" id="reglement" value="2">
    					<label class="form-check-label" for="reglement">100%</label>
    				</div> --}}
    				<div class="col-md-2"></div>
        		</div>
{{-- validation modifications --}}
				<div class="row">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary">
							valider
						</button>
						<a href="#" type="button" class="btn btn-secondary">
							Annuler
						</a>
						<div class="col-md-5"></div>
					</div>
				</div>
			</form>
	</section>
</main>
@endsection