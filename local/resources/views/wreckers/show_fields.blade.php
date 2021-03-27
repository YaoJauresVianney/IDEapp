<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $wrecker->id !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $wrecker->code !!}</p>
</div>

<!-- Car Imm Field -->
<div class="form-group">
    {!! Form::label('car_imm', 'Immatriculation:') !!}
    <p>{!! $wrecker->car_imm !!}</p>
</div>

<!-- Label Field -->
<div class="form-group">
    {!! Form::label('label', 'Description:') !!}
    <p>{!! $wrecker->label !!}</p>
</div>

<!-- Is Enabled Field -->
<div class="form-group">
    {!! Form::label('is_enabled', 'En ligne:') !!}
    <p>{!! $wrecker->is_enabled !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $wrecker->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $wrecker->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $wrecker->updated_at !!}</p>
</div>

