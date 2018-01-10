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
    {!!  Form::open( array( 'route' => ['archivos.index'], 'role' => 'form' ) ) !!}
    @include('archivos._fields')
    {!! Form::close() !!}
</div>

<ul>
    @foreach($permiso as $key => $value)
        <li>{!! $value->permiso !!}</li>
    @endforeach
</ul>
@endsection