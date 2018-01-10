Permiso: {!! Form::text('nombre_perfil') !!}<br />
Tipo: {!!  Form::select('tipo', array('defecto'=>'Por Defecto','personalizada'=>'Personalizado')) !!}<br />
{!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
