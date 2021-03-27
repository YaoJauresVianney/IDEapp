<!-- Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label', 'Libellé:') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Enabled Field -->
<div class="form-group col-sm-6">
    <label class="checkbox-inline">
        {!! Form::hidden('is_enabled', 0) !!}
        {!! Form::checkbox('is_enabled', '1', null) !!} Mettre en ligne </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('criterias.index') !!}" class="btn btn-default">Annuler</a>
</div>
