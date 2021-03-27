@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier une catégorie de client
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($peopletype, ['route' => ['peopletypes.update', $peopletype->id], 'method' => 'patch']) !!}

                        @include('peopletypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection