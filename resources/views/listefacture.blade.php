@extends('layouts.adminlayout')

@section('title', "Administration du site")

@section('contenu')
{{--  header  --}}
<header class="container">
    <div class="row">
        <div class="col-12">                        
            <h1>
                Espace client
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
               Mes Factures
            </h2>

        </div>
        <div class="col-12">
            <table class="table" style="width: 100%">
                 <thead class="thead-dark">
            <tr>
                    <th>Numero du devis</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Montant facturé</th>
                </tr>
                 </thead>        
                
            </div>              
            @foreach($listefacture as $facture)
         
                  <tr>
                    <td>
                         {{$facture->Devis_id_numero_Devis}}
                    </td>




                {{-- date du devis --}}
             
                  <td>{{ \Carbon\Carbon::parse($facture->infos_date_facture)->format('d/m/Y') }}</td>  
                
                {{-- quantite --}}
                <td>
                     @php
                    if ($facture['infos_statut_facture'] == 0){
                        $stat = "En cours";
                    }
                    else {
                        $stat = "Réglée";
                    }
                    @endphp
                    {{ $stat }}
                    
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