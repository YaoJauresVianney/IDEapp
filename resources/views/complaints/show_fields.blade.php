<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $complaint->id !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client:') !!}
    <p>{!! $complaint->client->fullname_phone !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Facturier:') !!}
    <p>{!! $complaint->user->name !!}</p>
</div>

<!-- Vehicle Rights Field -->
<div class="form-group">
    {!! Form::label('vehicle_rights', 'Lien avec le véhicule:') !!}
    <p>{!! $complaint->vehicle_rights !!}</p>
</div>

<!-- Brand Field -->
<div class="form-group">
    {!! Form::label('brand', 'Marque:') !!}
    <p>{!! $complaint->brand !!}</p>
</div>

<!-- Car Imm Field -->
<div class="form-group">
    {!! Form::label('car_imm', 'Immatriculation:') !!}
    <p>{!! $complaint->car_imm !!}</p>
</div>

<!-- Date Getting Field -->
<div class="form-group">
    {!! Form::label('date_getting', 'Date enlèvement:') !!}
    <p>{!! $complaint->date_getting !!}</p>
</div>

<!-- Place Getting Field -->
<div class="form-group">
    {!! Form::label('place_getting', 'Lieu de l\'enlèvement:') !!}
    <p>{!! $complaint->place_getting !!}</p>
</div>

<!-- Reasons Field -->
<div class="form-group">
    {!! Form::label('reasons', 'Motif de la réclamation:') !!}
    <p style="white-space: pre-wrap;">{!! $complaint->reasons !!}</p>
</div>

<!-- Goals Field -->
<div class="form-group">
    {!! Form::label('goals', 'Objectifs visés par la réclamation:') !!}
    <p style="white-space: pre-wrap;">{!! $complaint->goals !!}</p>
</div>

<!-- Deleted At Field -->
<!-- <div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $complaint->deleted_at !!}</p>
</div>
 -->
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ajoutée le:') !!}
    <p>{!! $complaint->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modifiée le:') !!}
    <p>{!! $complaint->updated_at !!}</p>
</div>

