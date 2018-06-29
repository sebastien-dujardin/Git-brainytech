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
                        Date
                    </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                        Statut
                    </strong>
                </div>
                <div class="col-md-1">
                    <strong>
                        Montant facturé
                    </strong>
                </div>
                       
                <hr class="col-12">
            </div>              
            @foreach($listefacture as $facture)
            <div class="row py-1">
                {{-- date du devis --}}
                <div class="col-md-1">
                    {{ \Carbon\Carbon::parse($facture->infos_date_facture)->format('d/m/Y') }}
                </div>
                
                
                {{-- quantite --}}
                <div class="col-md-1 text-left">
                    {{ $facture->infos_statut_facture  }}
                </div>

                {{-- montant en euros du devis --}}
                <div class="col-md-1">
                    {{ $facture->infos_montant_facture }}
                </div>
                {{-- 50% ou 100% --}}
               {{--  <div class="col-md-1">
                    @php
                    if ($facture['infos_statut_devis'] == 1){
                        $stat = "En cours";
                    }
                    elseif ($facture['infos_statut_devis'] == 2) {
                        $stat = "Accepté";
                    }
                    else {
                        $stat = "Annulé";
                    }
                    @endphp
                    {{ $stat }}
                </div> --}}
                {{-- 50% ou 100% --}}
                
                    {{-- champ reste a regler --}}

                {{--  action  --}}
                <div class="col-md-2">
                    {{--  modification  --}}

                </div>
            </div>
            <hr class="col-12">
            @endforeach
            {{-- pagination --}}
             <nav aria-label="Page navigation">
                {{ $listefacture->links('vendor.pagination.bootstrap-4') }}
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
                <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input reglement" type="radio" name="reglement"  value="1">
                        <label class="form-check-label" for="reglement">50%</label>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input reglement" type="radio" name="reglement"  value="2">
                        <label class="form-check-label" for="reglement">100%</label>
                    </div>
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
        $(".reglement").on('click', function () {
        var regle = $(this).val();
        $(this).find('.modal-body p').html("Voulez-vous vraiment accepter ce devis ?");
        $("#confirm2").attr("href", "{{URL::to('/devisvalide')}}"+"/"+id+'/'+regle);
        });
    });
</script>  
@endsection

{{--  --}}