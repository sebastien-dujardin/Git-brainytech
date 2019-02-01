@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus  placeholder="Votre nom">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>
                            <div class="col-md-6">
                                <input id="infos_prenom" type="text" class="form-control{{ $errors->has('infos_prenom') ? ' is-invalid' : '' }}" name="infos_prenom" value="{{ old('infos_prenom') }}" required autofocus  placeholder="Votre prénom">
                                @if ($errors->has('infos_prenom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_prenom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_numero_tel" class="col-md-4 col-form-label text-md-right">{{ __('Numéro téléphone obligatoire') }}</label>
                            <div class="col-md-6">
                                <input id="infos_numero_tel" type="text" class="form-control{{ $errors->has('infos_numero_tel') ? ' is-invalid' : '' }}" name="infos_numero_tel" value="{{ old('infos_numero_tel') }}" required autofocus  placeholder="Votre numéro de téléphone">
                                @if ($errors->has('infos_numero_tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_numero_tel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Votre e-mail">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
                            <div class="col-md-6">
                                <input id="infos_adresse" type="text" class="form-control{{ $errors->has('infos_adresse') ? ' is-invalid' : '' }}" name="infos_adresse" value="{{ old('infos_adresse') }}"  placeholder="Votre adresse">
                                @if ($errors->has('infos_adresse'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_adresse') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_complement_adresse" class="col-md-4 col-form-label text-md-right">{{ __('Infos adresse supplémentaires') }}</label>
                            <div class="col-md-6">
                                <input id="infos_complement_adresse" type="text" class="form-control{{ $errors->has('infos_complement_adresse') ? ' is-invalid' : '' }}" name="infos_complement_adresse" value="{{ old('infos_complement_adresse') }}"  placeholder="Vos compléments d'adresse">
                                @if ($errors->has('infos_complement_adresse'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_complement_adresse') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>
                            <div class="col-md-6">
                                <input id="infos_code_postal" type="text" class="form-control{{ $errors->has('infos_code_postal') ? ' is-invalid' : '' }}" name="infos_code_postal" value="{{ old('infos_code_postal') }}" required placeholder="Votre code postal">
                                @if ($errors->has('infos_code_postal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_code_postal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="infos_ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
                            <div class="col-md-6">
                                <input id="infos_ville" type="text" class="form-control{{ $errors->has('infos_ville') ? ' is-invalid' : '' }}" name="infos_ville" value="{{ old('infos_ville') }}" required  placeholder="Votre ville">
                                @if ($errors->has('infos_ville'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_ville') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Votre mot de passe">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Confirmer le mot de passe">
                            </div>
                        </div>

                        <div class="col-6"><h2>Entreprise ?</h2></div>
                        Ouvrir le formulaire correspondant 
                        <input type="checkbox" name="choix" id="marteau">

                        <div class="form-group" id="diventreprise">
                            <div class="form-group row">  
                                <label for="infos_adresse_entreprise" class="col-md-4 col-form-label text-md-right">{{ __('Infos Adresse Entreprise') }}</label>
                                <div class="col-md-6">
                                    <input type="" name="infos_adresse_entreprise" class="form-control{{ $errors->has('infos_adresse_entreprise') ? ' is-invalid' : '' }}" placeholder="Entrer son adresse d'Entreprise">
                                    @if ($errors->has('infos_adresse_entreprise'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infos_adresse_entreprise') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="infos_nom_entreprise" class="col-md-4 col-form-label text-md-right">{{ __('Nom Entreprise') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="infos_nom_entreprise" class="form-control{{ $errors->has('infos_nom_entreprise') ? ' is-invalid' : '' }}" placeholder="Entrer le nom d'Entreprise" >
                                    @if ($errors->has('infos_nom_entreprise'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infos_nom_entreprise') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="infos_nom_createur_compte" class="col-md-4 col-form-label text-md-right">{{ __('Nom createur compte') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="infos_nom_createur_compte" class="form-control hidden{{ $errors->has('infos_nom_createur_compte') ? ' is-invalid' : '' }}" placeholder="Entrer son nom de createur">
                                    @if ($errors->has('infos_nom_createur_compte'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infos_nom_createur_compte') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="infos_siret" class="col-md-4 col-form-label text-md-right">{{ __('Informations SIRET') }}</label>
                                <div class="col-md-6">
                                    <input type="" name="infos_siret" class="form-control{{ $errors->has('infos_siret') ? ' is-invalid' : '' }}" placeholder="Entrer son numéro de SIRET">
                                    @if ($errors->has('infos_siret'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infos_siret') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-raised btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection