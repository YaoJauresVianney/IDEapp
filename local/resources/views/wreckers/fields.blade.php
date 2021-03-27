<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Imm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_imm', 'Immatriculation:') !!}
    {!! Form::text('car_imm', null, ['class' => 'form-control']) !!}
</div>

<!-- Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label', 'Description:') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Enabled Field -->
<div class="form-group col-sm-6">
    <label class="checkbox-inline">
        {!! Form::hidden('is_enabled', false) !!}
        {!! Form::checkbox('is_enabled', '1', null) !!} Mettre en ligne
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('wreckers.index') !!}" class="btn btn-default">Annuler</a>
</div>
