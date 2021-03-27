<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

<!-- Vehicle Rights Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_rights', 'Lien avec le véhicule:') !!}
    {!! Form::text('vehicle_rights', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Marque du véhicule:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Imm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_imm', 'Immatriculation:') !!}
    {!! Form::text('car_imm', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Getting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_getting', 'Date d\'enlèvement:') !!}
    {!! Form::date('date_getting', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Getting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('place_getting', 'Lieu d\'enlèvement:') !!}
    {!! Form::text('place_getting', null, ['class' => 'form-control']) !!}
</div>

<!-- Reasons Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reasons', 'Motif de la réclamation:') !!}
    {!! Form::textarea('reasons', null, ['class' => 'form-control','rows'=>3]) !!}
</div>

<!-- Goals Field -->
<div class="form-group col-sm-6">
    {!! Form::label('goals', 'Objectifs visés par la réclamations:') !!}
    {!! Form::textarea('goals', null, ['class' => 'form-control','rows'=>3]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('complaints.index') !!}" class="btn btn-default">Annuler</a>
</div>
