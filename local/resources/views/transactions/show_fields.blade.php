<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', 'Motifs:') !!}
    <p style="white-space: pre">{!! $transaction->desc !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Montant:') !!}
    <p>{!! $transaction->amount !!} Fcfa</p>
</div>

<!-- Way Of Field -->
<div class="form-group">
    {!! Form::label('way_of', 'Moyen de paiement:') !!}
    <p>{!! $transaction->way_of !!}</p>
</div>

<!-- Num Transaction Field -->
<div class="form-group">
    {!! Form::label('num_transaction', 'Numero de la Transaction:') !!}
    <p>{!! $transaction->num_transaction !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ajouté le:') !!}
    <p>{!! gmdate("d-m-Y \à H:i:s", strtotime($transaction->created_at)) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modifié le:') !!}
    <p>{!! gmdate("d-m-Y \à H:i:s", strtotime($transaction->updated_at)) !!}</p>
</div>

