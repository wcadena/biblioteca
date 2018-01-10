@extends('app')
@section('titulo')Todas las Carpetas @endsection

@section('content')

    <div class="box">

        <!-- Nav tabs -->


        <!-- Tab panes -->

        <div class="box-header">
            <h3 class="box-title">Todas las Carpetas</h3>
            <div class="box-tools">
                <div class="input-group">
                    <a href="{!! URL::to('usuario/create')!!}" class=".btn.btn-app">Nuevo Usuario</a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>id</td>
                                <td>Nombre</td>
                                <td>Empresa</td>
                                <td>Correo</td>
                                <td>Rol</td>

                                <td>Acciones</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entries as $key => $value)
                                <tr>
                                    <td>{!! $value->id !!}</td>
                                    <td>{!! $value->name !!}</td>
                                    <td>{!! $value->empresa !!}</td>
                                    <td>{!! $value->email !!}</td>
                                    <td>{!! $value->role !!}</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>

                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                                        {!! Form::open(array('url' => 'usuario/' . $value->id, 'class' => 'pull-right')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('Borrar este Archivo', array('class' => 'btn btn-warning')) !!}
                                        {!! Form::close() !!}

                                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success" href="{!! URL::to('usuario/' . $value->id) !!}">Mostrar este turno</a>

                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{!! URL::to('usuario/' . $value->id . '/edit') !!}">Editar</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


        </div>

@endsection

@section('scriptEspecialFinal') @endsection