@extends('layouts.mainlayout')
@section('title', 'Profil')
@section('contenu')
<main class="container">
    <section class="row">
        <div class="col mt-5">
            <h1>
                Profil de : {{ Auth::user()->name }} {{ Auth::user()->info_prenom }}
            </h1>
            <p>
                Nom : {{ Auth::user()->name }}
            </p>
            <p>
                Prénom : {{ Auth::user()->info_prenom}}
            </p>
            <p>
                Téléphone facultatif: {{ Auth::user()->info_tel_2 }} <a href="{{route('modificationprofil')}}">Modifier</a>
            </p>
            <p>
                Adresse : {{  Auth::user()->info_adresse }} {{ Auth::user()->infos_ville }} {{  Auth::user()->infos_code_postal    }} <a href="{{route('modificationprofil')}}">Modifier</a>
            <p>
                Email : {{  Auth:user()->email   }}
            </p>
                <p>
                    Numero de telephone : {{  Auth::user()->info_numero_tel}}
                </p>
                <p>
                    Date d'anncienneté : {{  Auth::user()->created_at   }}
                </p>
                <p>
                    Points de fidélité : {{  Auth::user()->infos_nbre_crédits  }}
                </p>
        </div>
    </section>
</main>
@endsection

