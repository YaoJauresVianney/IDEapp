@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier la dépanneuse
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wrecker, ['route' => ['wreckers.update', $wrecker->id], 'method' => 'patch']) !!}

                        @include('wreckers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection