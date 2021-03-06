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

            @if(session('message2'))
            <div class="alert alert-danger text-center">
                {{ session('message2') }}
            </div>
            @endif    
            <h2>
               Mes devis
            </h2>
            <hr>
        </div>
        <div class="col-12">
           <table class="table" style="width: 100%">
               <thead class="thead-dark">     
                <tr>
                       <th> Creation</th>
                       <th>Expiration</th>
                       <th> Description</th>
                       <th>Quantite</th>
                       <th>Montant</th>
                       <th>Reste a Regler</th>
                       <th>Action</th>
                  </tr> 
                  </thead>  
                           
            @foreach($listedevis as $devis)
           <tr>
                {{-- date du devis --}}
                <td>
                    {{ \Carbon\Carbon::parse($devis->infos_date_devis)->format('d/m/Y') }}
                </td>
                {{-- champ expiration --}}
                <td>
                    {{ \Carbon\Carbon::parse($devis->infos_date_expiration)->format('d/m/Y') }}
                </td>
                {{-- description des taches a effectué --}}
                <td>
                    {{ $devis->description }}
                </td>
                
                {{-- quantite --}}
                <td>
                    {{ $devis->quantite  }}
                </td>

                {{-- montant en euros du devis --}}
                <td>{{ $devis->infos_montant_devis }}</td> 
                
                
                @php
                    if ($devis->infos_reglement == '50%'){
                        $rest = $devis->infos_montant_devis/2;
                    }
                    elseif ($devis->infos_reglement == '100%'){
                        $rest = 0;
                    }
                    else {
                        $rest = $devis->infos_montant_devis;
                    }
                @endphp
                    {{-- champ reste a regler --}}
                <td>
                    {{ $rest }}
                </td>

                {{--  action  --}}
                <td>
                    {{--  modification  --}}

                    @if ($devis->infos_statut_devis == 1)
                    <a class="spacebtn btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#confirmModale2" data-id="{{$devis->id_numero_Devis}}">
                        Accepter
                    </a>
                    {{--  suppression  --}}
                    <a class="spacebtn btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#confirmModale" data-id="{{$devis->id_numero_Devis}}">
                        Refusé
                    </a> 
                    @endif
                    @if ($devis->infos_statut_devis == 2)
                    <p class="text-success">Validé le : {{ \Carbon\Carbon::parse($devis->date_validation)->format('d/m/Y') }}</p>
                    @endif
                    @if ($devis->infos_statut_devis == 0)
                    <p class="text-danger">Refusé le : {{ \Carbon\Carbon::parse($devis->date_refus)->format('d/m/Y') }}</p>
                    @endif
                </td>
            </tr>
            @endforeach
            {{-- pagination --}}
             <nav aria-label="Page navigation">
                {{ $listedevis->links('vendor.pagination.bootstrap-4') }}
            </nav> 
            </table>
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
                    Confirmer validation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Veuillez choisir une modalité de réglement :
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