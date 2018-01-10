<?php $salto=$value->tipo; ?>
<tr>
    <!--<td>{!! $value->id !!}</td>
    <td>{!! $value->archivos_id !!}</td>-->
    <td>{!! $salto !!}{!! $value->nombre !!}</td>
    <!--<td>{!! $value->tipo !!}</td>
                                    <td>{!! $value->identificacion !!}</td>-->
    <!-- we will also add show, edit, and delete buttons -->
    <td>

        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
        <!-- we will add this later since its a little more complicated than the other two buttons -->
        {!! Form::open(array('url' => 'archivos/' . $value->id, 'class' => 'pull-right')) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Borrar este Archivo', array('class' => 'btn btn-warning')) !!}
        {!! Form::close() !!}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
        <a class="btn btn-small btn-success" href="{!! URL::to('archivos/' . $value->id) !!}">Mostrar este turno</a>

        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
        <a class="btn btn-small btn-info" href="{!! URL::to('archivos/' . $value->id . '/edit') !!}">Editar</a>

    </td>
</tr>
<?php
$entries2 = \App\Archivo::where('tipo', 'rama')->
where('archivos_id', $value->id)->
orderBy('archivos_id', 'asc')->orderBy('id', 'asc')->get();
?>
@foreach($entries2 as $key => $value)
     <?php $value->tipo=$salto.'__'; ?>
    @include('archivos._arbol', $value)
@endforeach