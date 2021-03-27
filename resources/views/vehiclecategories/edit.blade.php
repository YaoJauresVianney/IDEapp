@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier une catégorie
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vehiclecategory, ['route' => ['vehiclecategories.update', $vehiclecategory->id], 'method' => 'patch']) !!}

                        @include('vehiclecategories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection