Padre: {!! Form::select('archivos_id', \App\Archivo::genlist()) !!}<br />
Nombre Carpeta: {!! Form::text('nombre') !!}<br />
{!! Form::hidden('tipo', 'rama') !!}
{!! Form::hidden('email') !!}<br />
{!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
