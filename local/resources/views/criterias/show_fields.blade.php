<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $criteria->id !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $criteria->code !!}</p>
</div>

<!-- Label Field -->
<div class="form-group">
    {!! Form::label('label', 'Libellé:') !!}
    <p>{!! $criteria->label !!}</p>
</div>

<!-- Is Enabled Field -->
<div class="form-group">
    {!! Form::label('is_enabled', 'Is Enabled:') !!}
    <p>{!! $criteria->is_enabled !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $criteria->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $criteria->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $criteria->updated_at !!}</p>
</div>

