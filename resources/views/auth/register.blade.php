@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Register') }}
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Name') }}
                            </label>                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>                                
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('name') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="infos_prenom" class="col-md-4 col-form-label text-md-right">
                                {{ __('Prenom') }}
                            </label>
                            <div class="col-md-6">
                                <input id="infos_prenom" type="text" class="form-control{{ $errors->has('infos_prenom') ? ' is-invalid' : '' }}" name="infos_prenom" value="{{ old('infos_prenom') }}" required autofocus>
                                @if ($errors->has('infos_prenom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('infos_prenom') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--  <div class="form-group row">
                            <label for="infos_genre" class="col-md-3 col-form-label text-md-right">Sexe</label>
                            <div class="col-md-8">
                                @foreach($user as $user)
                                <select id="infos_genre" class="form-control" name="infos_genre" required>
                                    <option value ="0" selected {{ ($user->infos_genre == 0  )? ' selected' : ''}}>Mme</opttion>
                                        <option value ="1"{{( $user->infos_genre == 1 ) ? ' selected' : ''}}>Mr</opttion>
                                        </select>
                                        @endforeach
                                    </div>
                                </div><!-- /.row -->
                            </div> --}}
                        
                        
                        
                        <div class="form-group row">
                            <label for="infos_numero_tel" class="col-md-4 col-form-label text-md-right">
                                {{ __('Numéro téléphone obligatoire') }}
                            </label>
                            <div class="col-md-6">
                                <input id="infos_numero_tel" type="text" class="form-control{{ $errors->has('infos_numero_tel') ? ' is-invalid' : '' }}" name="infos_numero_tel" value="{{ old('infos_numero_tel') }}" required autofocus>
                                
                                @if ($errors->has('infos_numero_tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_numero_tel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="infos_numero_tel_2" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone (facultatif)') }}</label>
                            
                            <div class="col-md-6">
                                <input id="infos_numero_tel_2" type="text" class="form-control{{ $errors->has('infos_numero_tel_2') ? ' is-invalid' : '' }}" name="infos_numero_tel_2" value="{{ old('infos_numero_tel_2') }}"  autofocus>
                                
                                @if ($errors->has('infos_numero_tel_2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('infos_numero_tel_2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                
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
                                <input id="infos_adresse" type="infos_adresse" class="form-control{{ $errors->has('infos_adresse') ? ' is-invalid' : '' }}" name="infos_adresse" value="{{ old('infos_adresse') }}">
                                
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
                                <input id="infos_complement_adresse" type="infos_complement_adresse" class="form-control{{ $errors->has('infos_complement_adresse') ? ' is-invalid' : '' }}" name="infos_complement_adresse" value="{{ old('infos_complement_adresse') }}">
                                @if ($errors->has('infos_complement_adresse'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('infos_complement_adresse') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="infos_code_postal" class="col-md-4 col-form-label text-md-right">
                                {{ __('Code Postal') }}
                            </label>
                            <div class="col-md-6">
                                <input id="infos_code_postal" type="infos_code_postal" class="form-control{{ $errors->has('infos_code_postal') ? ' is-invalid' : '' }}" name="infos_code_postal" value="{{ old('infos_code_postal') }}" required>
                                @if ($errors->has('infos_code_postal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('infos_code_postal') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="infos_ville" class="col-md-4 col-form-label text-md-right">
                                {{ __('Ville') }}
                            </label>
                            <div class="col-md-6">
                                <input id="infos_ville" type="infos_ville" class="form-control{{ $errors->has('infos_ville') ? ' is-invalid' : '' }}" name="infos_ville" value="{{ old('infos_ville') }}" required>
                                @if ($errors->has('infos_ville'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('infos_ville') }}
                                    </strong>
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                {{ __('Mot de passe confirmation') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Confirmer le mot de passe">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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