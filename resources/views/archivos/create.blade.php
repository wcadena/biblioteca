@extends('app')
@section('titulo')Reporte General @endsection
@section('content')
<h1>Crear una Carpeta</h1>

<!-- if there are creation errors, they will show here -->
{!!Html::ul($errors->all()) !!}
<div class="box box-primary">
    {!!  Form::open( array( 'route' => ['archivos.index'], 'role' => 'form' ) ) !!}
    @include('archivos._fields')
    {!! Form::close() !!}
</div>
@endsection