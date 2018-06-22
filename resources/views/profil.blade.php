@extends('layouts.mainlayout')
@section('title', 'Profil')
@section('contenu')
<main class="container">
    <section class="row">
        <div class="col mt-5">
            <h1>
                Profil de : {{ Auth::user()->name }} {{ Auth::user()->infos_prenom }}
            </h1>
            <p>
                Nom : {{ Auth::user()->name }}
            </p>
            <p>
                Prénom : {{ Auth::user()->infos_prenom}}
            </p>
            <p>
                Adresse : {{  Auth::user()->infos_adresse }} {{ Auth::user()->infos_ville }} {{  Auth::user()->infos_code_postal    }} <a href="{{route('modificationprofil')}}">Modifier</a>
            <p>
                Email : {{  Auth:user()->email   }}
            </p>
                <p>
                    Numero de telephone : {{  Auth::user()->infos_numero_tel}}
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

