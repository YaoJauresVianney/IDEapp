<div class="form-group col-sm-12 text-center">
    @if(isset($reference))
    <h3>Reférence: <strong>{{ $reference }}</strong></h3>
    {!! Form::hidden('reference', $reference) !!}   
    @else
    <h3>Reférence: <strong>{{ $repair->reference }}</strong></h3> 
    {!! Form::hidden('reference', $repair->reference) !!}          
    @endif
</div>

<div class="col-sm-12">
    <h3>Véhicule<hr></h3>
</div>
<!-- Date Getting Field -->
<div class="form-group col-sm-4">
    {!! Form::label('date_getting', "Date de l'enlèvement") !!}
    @if(isset($repair))
    {!! Form::date('date_getting', gmdate('Y-m-d', strtotime($repair->date_getting)), ['class' => 'form-control']) !!}
    @else
    {!! Form::date('date_getting', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Hour Getting Field -->
<div class="form-group col-sm-4">
    {!! Form::label('hour_getting', "Heure de l'enlèvement") !!}
    {!! Form::time('hour_getting', null, ['class' => 'form-control']) !!}
</div>

<!-- Wrecker Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('place_getting', "Lieu de l'enlèvement") !!}
    {!! Form::text('place_getting', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Brand Field -->
<div class="form-group col-sm-4">
    {!! Form::label('car_brand', 'Marque du véhicule') !!}
    {!! Form::text('car_brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('vehiclecategory_id', 'Catégorie du véhicule:') !!}
    {!! Form::select('vehiclecategory_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Car Imm Field -->
<div class="form-group col-sm-4">
    {!! Form::label('car_imm', 'Immatriculation:') !!}
    {!! Form::text('car_imm', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Getting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wrecker_id', 'Dépanneuse:') !!}
    {!! Form::select('wrecker_id', $wreckers, null, ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('peopletype_id', 'Type de client:') !!}
    {!! Form::select('peopletype_id', $peoples, null, ['class' => 'form-control']) !!}
</div>

<!-- Reasons Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reasons', 'Motif de l\'enlevement:') !!}
    {!! Form::textarea('reasons', null, ['class' => 'form-control','rows'=>5]) !!}
</div>

<div class="col-sm-12">
    <h3>Client<hr></h3>
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('client_id', 'Choisir un client:') !!}
    {!! Form::select('client_id', [null=>'- Selectionner un client -']+$clients->toArray(), null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-2 text-center" style="margin:100px 0">
   <strong> OU </strong>   
</div>


<!-- Client Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('fullname', 'Nom et prénoms du client:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}

    {!! Form::label('cni', 'Numéro Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control']) !!}

    {!! Form::label('num_license', 'Num Permis de conduire:') !!}
    {!! Form::text('num_license', null, ['class' => 'form-control']) !!}

    {!! Form::label('passport', 'Num Passport:') !!}
    {!! Form::text('passport', null, ['class' => 'form-control']) !!}

    {!! Form::label('phone1', 'Contact 1:') !!}
    {!! Form::text('phone1', null, ['class' => 'form-control']) !!}

    {!! Form::label('phone2', 'Contact 2:') !!}
    {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
</div>


<div class="col-sm-12">
    <h3>Inventaire<hr></h3>
</div>

<div class="col-sm-12">
    <table class="table table-bordered criteria">
        <thead>
            <th></th>
            <th>Oui</th>
            <th width="15%">Nombre</th>
            <th>Etat et Observations</th>
        </thead>
        <tbody>
            @if(!isset($repair))
                @foreach($criterias as $k => $c)
                <tr>
                    <td>{{ $c->label }}</td>
                    <td>{!! Form::checkbox("yes[$c->id]", '1', null) !!}</td>
                    <td>{!! Form::number("num[$c->id]", 0, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::text("comments[$c->id]", null, ['class' => 'form-control']) !!}</td>
                </tr>
                @endforeach
            @else
                @foreach($repair->criterias as $k => $c)
                <tr>
                    <td>{{ $c->label }}</td>
                    <td>{!! Form::checkbox("yes[$c->id]", '1', $c->pivot->yes) !!}</td>
                    <td>{!! Form::number("num[$c->id]", $c->pivot->number, ['class' => 'form-control']) !!}</td>
                    <td>{!! Form::text("comments[$c->id]", $c->pivot->comments, ['class' => 'form-control']) !!}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>


<!-- Luggage Field -->
<div class="form-group col-sm-4 text-center">
    <label class="checkbox-inline">
        {!! Form::hidden('luggage', 0) !!}
        {!! Form::checkbox('luggage', '1', null) !!} Liste des bagages jointe ?
    </label>
</div>

<!-- Car License Field -->
<div class="form-group col-sm-4 text-center">
    <label class="checkbox-inline">
        {!! Form::hidden('car_license', 0) !!}
        {!! Form::checkbox('car_license', '1', null) !!} Papier du véhicule remis
    </label>
</div>

<!-- Car Keys Field -->
<div class="form-group col-sm-4 text-center">
    <label class="checkbox-inline">
        {!! Form::hidden('car_keys', 0) !!}
        {!! Form::checkbox('car_keys', '1', null) !!} Clés du véhicule remis
    </label>
</div>



<div class="col-sm-12">
    <h3>Autres informations<hr></h3>
</div>


<!-- Kg Field -->
<div class="form-group col-sm-4">
    {!! Form::label('kg', 'Nombre de Kilogramme transporté:') !!}
    {!! Form::number('kg', null, ['class' => 'form-control','min'=>0]) !!}
</div>


<!-- Exchanger Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exchanger', 'Echangeur:') !!}
    {!! Form::text('exchanger', null, ['class' => 'form-control']) !!}
</div>

<!-- Counter Field -->
<div class="form-group col-sm-4">
    {!! Form::label('counter', 'Decompte:') !!}
    {!! Form::text('counter', null, ['class' => 'form-control']) !!}
</div>

<!-- Kms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kms', 'Kms:') !!}
    {!! Form::text('kms', null, ['class' => 'form-control']) !!}
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension', 'Extension:') !!}
    {!! Form::text('extension', null, ['class' => 'form-control']) !!}
</div>

<!-- Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('charge', 'Chargement:') !!}
    {!! Form::text('charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Pc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pc', 'PC:') !!}
    {!! Form::text('pc', null, ['class' => 'form-control']) !!}
</div>

<!-- Scope Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scope', 'Portée:') !!}
    {!! Form::text('scope', null, ['class' => 'form-control']) !!}
</div>

<!-- Tvs Place Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tvs_place', 'TVS/Place:') !!}
    {!! Form::text('tvs_place', null, ['class' => 'form-control']) !!}
</div>

<!-- Others Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('others', 'Autres:') !!}
    {!! Form::textarea('others', null, ['class' => 'form-control','rows'=>4]) !!}
</div>


<!-- Attachments Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('attachments', 'Attachments:') !!}
    {!! Form::text('attachments', null, ['class' => 'form-control']) !!}
</div> -->

<!-- State Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('repairs.index') !!}" class="btn btn-default">Annuler</a>
</div>
