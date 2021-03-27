@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Payer la facture <strong>N°{!! $repair->reference !!}</strong></h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
          <div class="box-body">
            <table class="table table-responsive" id="repairs-table">
              <thead>
                  <tr>
                      <th width="90">Référence</th>
                      <th>Client</th>
                      <th>Catégorie</th>
                      <th>Nbre.jours</th>
                      <th>Enlèvement</th>
                      <th>Status</th>
                      <th width="110">Total</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                      <a target="blank" href="{!! route('repairs.print', [$repair->id]) !!}" class='btn btn-link'>{!! $repair->reference !!}</a></td>
                      <td>{!! $repair->client->fullnamePhone !!}</td>
                      <td>{!! $repair->vehiclecategory->fullname !!} 
                          <div class="label label-default">{!! $repair->peopletype->label !!}</div><br>
                          {!! $repair->car_brand !!} -
                          {!! $repair->car_imm !!}
                      </td>
                      <td class="text-center" style="font-size:20px; font-weight:bold">{!! $repair->numberDays() !!}</td>
                      <td>{!! gmdate('d-m-Y', strtotime($repair->date_getting)) !!}
                          à {!! $repair->hour_getting !!} <br>
                          {!! $repair->place_getting !!} </td>
                      <td>
                          @if($repair->state == 'pending')
                              <div class="label label-success">En cours</div>
                          @else
                              <div class="label label-default">Terminé</div>
                          @endif 
                      </td>
                      <td>{!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA</td>
                  </tr>
              </tbody>
            </table>
            <hr>
            @include('adminlte-templates::common.errors')
            {!! Form::open(['route' => ['repairs.payment',$repair->id], 'method' => 'post']) !!}
            <!-- Way Of Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('way_of', 'Moyen de paiement:') !!}
                {!! Form::text('way_of', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Num Transaction Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('num_transaction', 'Num Transaction:') !!}
                {!! Form::text('num_transaction', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Type Field -->
            <div class="form-group col-sm-6">
                {!! Form::hidden('user_id', Auth::user()->id) !!}
                {!! Form::label('type', 'Type:') !!}
                {!! Form::hidden('type', 'income') !!}
                {!! Form::select('type',['income'=>'Entrée d\'argent','outcome'=>'Dépenses'], null, ['class' => 'form-control','disabled'=>'disabled']) !!}
            </div>

            <!-- Amount Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('amount', 'Montant:') !!}
                {!! Form::hidden('amount', $repair->sumDays()+$repair->tva()) !!}
                {!! Form::number('amount', $repair->sumDays()+$repair->tva(), ['class' => 'form-control','disabled'=>'disabled']) !!}
            </div>

            <!-- Desc Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('desc', 'Motif:') !!}
                {!! Form::hidden('desc', 'Règlement de la facture N°'.$repair->reference.' d\'un montant de '.number_format($repair->sumDays()+$repair->tva(),0,'','.').' FCFA') !!}
                {!! Form::textarea('desc', 'Règlement de la facture N°'.$repair->reference.' d\'un montant de '.number_format($repair->sumDays()+$repair->tva(),0,'','.').' FCFA' , ['class' => 'form-control','disabled'=>'disabled']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('repairs.index') !!}" class="btn btn-default">Annuler</a>
            </div>
            {{ Form::close() }}
          </div>
        </div>  
    </div>
@endsection
