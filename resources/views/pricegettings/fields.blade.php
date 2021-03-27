<!-- Vehiclecategory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiclecategory_id', 'Categorie du véhicule:') !!}
    {!! Form::select('vehiclecategory_id',$categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Peopletype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peopletype_id', 'Type de client:') !!}
    {!! Form::select('peopletype_id', $peoples, null, ['class' => 'form-control']) !!}
</div>

<!-- Price Day Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('code', gmdate('ymdhis')) !!}
    {!! Form::label('price_day', 'Forfait jour:') !!}
    {!! Form::number('price_day', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Night Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_night', 'Forfait Nuit:') !!}
    {!! Form::number('price_night', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Enabled Field -->
<div class="form-group col-sm-6">
    <label class="checkbox-inline">
        {!! Form::hidden('per_kg', 0) !!}
        {!! Form::checkbox('per_kg', '1', null) !!} Facturation au KG </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pricegettings.index') !!}" class="btn btn-default">Annuler</a>
</div>
