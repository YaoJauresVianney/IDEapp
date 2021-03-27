<!-- Vehiclecategory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiclecategory_id', 'Catégorie:') !!}
    {!! Form::select('vehiclecategory_id',$categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Peopletype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peopletype_id', 'Type de Client:') !!}
    {!! Form::select('peopletype_id',$peoples, null, ['class' => 'form-control']) !!}
</div>

<!-- Penality Per Day Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('code', gmdate('ymdhis')) !!}
    {!! Form::label('penality_per_day', 'Penalité journalière de fourrière:') !!}
    {!! Form::text('penality_per_day', null, ['class' => 'form-control']) !!}
</div>


<!-- Is Enabled Field -->
<div class="form-group col-sm-12">
    <label class="checkbox-inline">
        {!! Form::hidden('per_kg', 0) !!}
        {!! Form::checkbox('per_kg', '1', null) !!} Facturation au KG </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pricepenalities.index') !!}" class="btn btn-default">Annuler</a>
</div>
