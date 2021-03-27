<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nom et prénoms:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mot de passe:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Numéro de téléphone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Fonction:') !!}
    {!! Form::select('role', ['null'=>'Selectionner un poste','facturier'=>'Facturier','caissiere'=>'Caissière','comptable'=>'Comptable','gerant'=>'Gérant'],null, ['class' => 'form-control']) !!}
</div>

<!-- Is Enabled Field -->
<div class="form-group col-sm-6">
    <label class="checkbox">
        {!! Form::hidden('is_enabled', 0) !!}
        {!! Form::checkbox('is_enabled', '1', null) !!} Activer le compte
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Annuler</a>
</div>
