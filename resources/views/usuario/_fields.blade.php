Padre: {!! Form::select('archivos_id', \App\Archivo::genlist()) !!}<br />
Nombre: {!! Form::text('name') !!}<br />
Empresa: {!! Form::text('empresa') !!}<br />
Correo: {!! Form::text('email') !!}<br />
Clave: {!! Form::password('password') !!}<br />
Rol: {!!  Form::select('role', array('user'=>'Usuario','editor'=>'Editor')) !!}<br />
{!! Form::button('Grabar', ['type' => 'submit']) !!}<br />
