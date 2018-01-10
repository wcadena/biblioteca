@extends('app')
@section('titulo')Mirar Carpeta @endsection
@section('content')
<?php
$nerd=$paso['nerd'];
$perfil=$paso['perfil'];

    //dd($paso);
?>
<div class="small-box bg-green">
    <div class="inner">
        <h3>{!! $nerd->nombre_perfil !!}</h3>
        <p>Permiso</p>
    </div>
    <div class="icon">
        <i class="ion ion-pie-graph"></i>
    </div>
</div>


{!!Html::ul($errors->all()) !!}
<div class="box box-primary">
    {!! Form::open(array('url' => 'perfil_permiso/', 'class' => 'form-inline')) !!}
    {!! Form::hidden('archivos_id',$nerd->id) !!}
    {!! Form::select('cat_id', \App\Permiso::genlist()) !!}
    {!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
    {!! Form::close() !!}
</div>



<ul>
    @foreach($perfil as $key => $value)
        <li>{!! $value->id !!}</li>
    @endforeach
</ul>
@endsection