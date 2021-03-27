<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $client->id !!}</p>
</div>

<!-- Fullname Field -->
<div class="form-group">
    {!! Form::label('fullname', 'Nom et prénoms:') !!}
    <p>{!! $client->fullname !!}</p>
</div>

<!-- Cni Field -->
<div class="form-group">
    {!! Form::label('cni', 'Num. Cni:') !!}
    <p>{!! $client->cni !!}</p>
</div>

<!-- Passport Field -->
<div class="form-group">
    {!! Form::label('passport', 'Passport:') !!}
    <p>{!! $client->passport !!}</p>
</div>

<!-- Num License Field -->
<div class="form-group">
    {!! Form::label('num_license', 'Num Permis de conduire:') !!}
    <p>{!! $client->num_license !!}</p>
</div>

<!-- Attachment Field -->
<!-- <div class="form-group">
    {!! Form::label('attachment', 'Attachment:') !!}
    <p>{!! $client->attachment !!}</p>
</div>
 -->
<!-- Phone1 Field -->
<div class="form-group">
    {!! Form::label('phone1', 'Contact 1:') !!}
    <p>{!! $client->phone1 !!}</p>
</div>

<!-- Phone2 Field -->
<div class="form-group">
    {!! Form::label('phone2', 'Contact 2:') !!}
    <p>{!! $client->phone2 !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $client->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $client->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $client->updated_at !!}</p>
</div>

