@extends('app')
@section('titulo')Mirar Carpeta @endsection
@section('content')
<?php
$nerd=$paso['nerd'];
$archivos=$paso['archivo'];
$permiso=$paso['permiso'];

    //dd($paso);
?>
<div class="small-box bg-green">
    <div class="inner">
        <h3>{!! $nerd->nombre !!}</h3>
        <p>Carpeta</p>
    </div>
    <div class="icon">
        <i class="ion ion-pie-graph"></i>
    </div>
</div>

<ul>
@foreach($archivos as $key => $value)
    <li>{!! $value->nombre !!}</li>
@endforeach
</ul>

{!!Html::ul($errors->all()) !!}
<div class="box box-primary">
    {!!  Form::open( array( 'route' => ['permisos.index'], 'role' => 'form' ) ) !!}
    {!! Form::hidden('archivos_id',$nerd->id) !!}

    Permiso: {!! Form::text('permiso',Nayjest\StrCaseConverter\Str::toCamelCase($nerd->nombre.'-').'-'.uniqid('',false)) !!}<br />
    Rol: {!!  Form::select('tipo', array('lectura'=>"Lectura",'denegar'=>'Denegar','administracion'=>'Administrar')) !!}<br />
    {!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
    {!! Form::close() !!}
</div>

<ul>
    @foreach($permiso as $key => $value)
        <li>
            {!! Form::open(array('url' => 'permisos/' . $value->id, 'class' => 'form-inline')) !!}
            {!! Form::label($value->permiso) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Borrar', array('class' => 'btn btn-default btn-xs')) !!}
            {!! Form::label($value->tipo) !!}
            {!! Form::close() !!}
        </li>
    @endforeach
</ul>
@endsection