<!-- Date Creation -->
<div class="form-group col-sm-12 col-md-6 offset-md-3">
    {!! Form::label('created_at', 'Date de paiement:') !!}
    @if(!isset($transaction))
        <input type="datetime-local" id="time" value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') }}" name="created_at" class="form-control">
    @else
        <input type="datetime-local" id="time" value="{{ str_replace(' ','T',$transaction->created_at) }}" name="created_at" class="form-control">
    @endif
</div>

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
    {!! Form::select('type',['income'=>'Entrée d\'argent','outcome'=>'Dépenses'], null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Montant:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Motif:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Annuler</a>
</div>
