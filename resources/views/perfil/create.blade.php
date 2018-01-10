@extends('app')
@section('titulo')Reporte General @endsection
@section('content')
<h1>Crear un Permiso</h1>

<!-- if there are creation errors, they will show here -->
{!!Html::ul($errors->all()) !!}
<div class="box box-primary">
    {!!  Form::open( array( 'route' => ['perfil.index'], 'role' => 'form' ) ) !!}
    @include('perfil._fields')
    {!! Form::close() !!}
</div>
@endsection