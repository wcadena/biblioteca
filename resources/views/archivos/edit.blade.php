@extends('app')
@section('titulo')Reporte General @endsection
@section('content')
<h1>Edit {!! $nerd->nombre !!}</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}


{!! Form::model( $nerd, ['route' => ['archivos.update', $nerd->id], 'method' => 'put', 'role' => 'form'] ) !!}
@include('archivos._fields')
{!! Form::close() !!}

@endsection