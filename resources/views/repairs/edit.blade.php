@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modifier un dépannage
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($repair, ['route' => ['repairs.update', $repair->id], 'method' => 'patch']) !!}

                        @include('repairs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection