{!! Form::text('archivos_id') !!}
Permiso: {!! Form::text('permiso') !!}<br />
Rol: {!!  Form::select('tipo', array('lectura'=>"Lectura",'denegar'=>'Denegar','administracion'=>'Administrar')) !!}<br />
{!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
