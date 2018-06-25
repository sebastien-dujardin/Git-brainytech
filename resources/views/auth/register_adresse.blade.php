@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div> 


                     <div class="plus">

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
                                            <strong>{{ $errors->first('infos_complement_adresse') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="infos_code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>

                                    <div class="col-md-6">
                                        <input id="infos_code_postal" type="infos_code_postal" class="form-control{{ $errors->has('infos_code_postal') ? ' is-invalid' : '' }}" name="infos_code_postal" value="{{ old('infos_code_postal') }}" required>

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
                                        <input id="infos_ville" type="infos_ville" class="form-control{{ $errors->has('infos_ville') ? ' is-invalid' : '' }}" name="infos_ville" value="{{ old('infos_ville') }}" required>

                                        @if ($errors->has('infos_ville'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('infos_ville') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>