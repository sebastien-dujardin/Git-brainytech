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
               Mes devis
            </h2>
            <hr>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-1">
                    <strong>
                        Creation
                    </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                        Expiration
                    </strong>
                </div>
                <div class="col-md-4">
                    <strong>
                        Description
                    </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                       Quantite
                   </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                        Montant
                    </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                      Reste a Regler
                  </strong>
              </div>  


            <div class="col-md-2 text-center">
                <strong>
                    Action
                </strong>
            </div>        
                <hr class="col-12">
            </div>              
            @foreach($listedevis as $devis)
            <div class="row py-1">
                {{-- date du devis --}}
                <div class="col-md-1">
                    {{ \Carbon\Carbon::parse($devis->infos_date_devis)->format('d/m/Y') }}
                </div>
                {{-- champ expiration --}}
                <div class="col-md-1">
                    {{ \Carbon\Carbon::parse($devis->infos_date_expiration)->format('d/m/Y') }}
                </div>
                {{-- description des taches a effectué --}}
                <div class="col-md-4">
                    {{ $devis->description }}
                </div>
                
                {{-- quantite --}}
                <div class="col-md-1 text-left">
                    {{ $devis->quantite  }}
                </div>

                {{-- montant en euros du devis --}}
                <div class="col-md-1">
                    {{ $devis->infos_montant_devis }}
                </div>
                {{-- 50% ou 100% --}}
               {{--  <div class="col-md-1">
                    @php
                    if ($devis['infos_statut_devis'] == 1){
                        $stat = "En cours";
                    }
                    elseif ($devis['infos_statut_devis'] == 2) {
                        $stat = "Accepté";
                    }
                    else {
                        $stat = "Annulé";
                    }
                    @endphp
                    {{ $stat }}
                </div> --}}
                {{-- 50% ou 100% --}}
                @php
                    if ($devis->infos_reglement == '50%'){
                        $rest = $devis->infos_montant_devis/2;
                    }
                    else {
                        $rest = 0;
                    }
                    @endphp
                    {{-- champ reste a regler --}}
                <div class="col-md-1">
                    {{ $rest }}
                </div>

                {{--  action  --}}
                <div class="col-md-2">
                    {{--  modification  --}}

                    @if ($devis->infos_statut_devis == 1)
                    <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#confirmModale2" data-id="{{$devis->id_numero_Devis}}">
                        Accepter
                    </a>
                    {{--  suppression  --}}
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#confirmModale" data-id="{{$devis->id_numero_Devis}}">
                        Refusé
                    </a> 
                    @endif
                    @if ($devis->infos_statut_devis == 2)
                    <p class="text-success">Validé le : {{ \Carbon\Carbon::parse($devis->date_validation)->format('d/m/Y') }}</p>
                    @endif
                    @if ($devis->infos_statut_devis == 0)
                    <p class="text-danger">Refusé le : {{ \Carbon\Carbon::parse($devis->date_refus)->format('d/m/Y') }}</p>
                    @endif
                </div>
            </div>
            <hr class="col-12">
            @endforeach
            {{-- pagination --}}
             <nav aria-label="Page navigation">
                {{ $listedevis->links('vendor.pagination.bootstrap-4') }}
            </nav> 
        </div>
    </main>
</section>
{{--  modal1  --}}
<div class="modal" tabindex="-1" id="confirmModale" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">
                    Confirmer annulation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Voulez-vous vraiment annuler le devis ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer
                </button>
                <a type="button" id="confirm" class="btn btn-primary">
                    Valider
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="confirmModale2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">
                    Confirmer annulation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Voulez-vous vraiment valider le devis ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer
                </button>
                <a type="button" id="confirm2" class="btn btn-primary">
                    Valider
                </a>
            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">
    $('#confirmModale').on('show.bs.modal', function (event) {
        var id = $(event.relatedTarget).data('id');
        $(this).find('.modal-body p').html("Voulez-vous vraiment annuler ce devis ?");
        $("#confirm").attr("href", "{{URL::to('/')}}/devisupprime/"+id);
    });
    $('#confirmModale2').on('show.bs.modal', function (event) {
        var id = $(event.relatedTarget).data('id');
        $(this).find('.modal-body p').html("Voulez-vous vraiment accepter ce devis ?");
        $("#confirm2").attr("href", "{{URL::to('/')}}/devisvalide/"+id);
    });
</script>  
@endsection