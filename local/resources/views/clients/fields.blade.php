<!-- Fullname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fullname', 'Nom et prénoms:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
</div>

<!-- Cni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni', 'Numéro Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control']) !!}
</div>

<!-- Passport Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passport', 'Passport:') !!}
    {!! Form::text('passport', null, ['class' => 'form-control']) !!}
</div>

<!-- Num License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_license', 'Num Permis de conduire:') !!}
    {!! Form::text('num_license', null, ['class' => 'form-control']) !!}
</div>

<!-- Attachment Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('attachment', 'Attachment:') !!}
    {!! Form::text('attachment', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Phone1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone1', 'Contact 1:') !!}
    {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone2', 'Contact 2:') !!}
    {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clients.index') !!}" class="btn btn-default">Annuler</a>
</div>
