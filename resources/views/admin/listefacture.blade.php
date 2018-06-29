@extends('layouts.adminlayout')

@section('title', "Administration du site")

@section('contenu')
{{--  header  --}}
<header class="container">
    <div class="row">
        <div class="col-12">                        
            <h1>
                Espace Administration
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
               Administration des factures clients
            </h2>

        </div>
        <div class="col-12">
            <table style="width: 100%">
            <tr>
                    <th>Numero du devis</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Statut</th>
                    <th>Montant facturé</th>
                </tr>
                       
                
            </div>              
            @foreach($listefacture as $facture)
         
                  <tr>
                    <td>
                         {{$facture->Devis_id_numero_Devis}}
                    </td>




                {{-- date du devis --}}
             
                  <td>{{ \Carbon\Carbon::parse($facture->infos_date_facture)->format('d/m/Y') }}</td>  
                

                  <td>
                     @php
                    $nom = App\usersModel::where('id', $facture['users_id'])->value('name');
                    $prenom = App\usersModel::where('id', $facture['users_id'])->value('infos_prenom');
                    @endphp
                    {{ $nom." ".$prenom }}
                  </td>

                {{-- statut --}}
                <td>
                     @php
                    if ($facture['infos_statut_facture'] == 0){
                        $stat = "En cours";
                    }
                    else {
                        $stat = "Réglée";
                    }
                    if ($facture['infos_statut_facture'] == 1){
                        $attente = "text-success";
                    }
                    else {
                        $attente = "text-danger";
                    }

                    @endphp
                    <span class="{{$attente}}">{{ $stat }}</span>
                    
                </td>

                {{-- montant en euros du devis --}}
                <td>
                    {{ $facture->infos_montant_facture }}
                </td>
            </tr>

            @endforeach
            {{-- pagination --}}
             <nav aria-label="Page navigation">
                {{ $listefacture->links('vendor.pagination.bootstrap-4') }}
            </nav> 
        </table>
        </div>
    </main>
</section>

@endsection

{{--  --}}