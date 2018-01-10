@extends('app')
@section('titulo')Subir archivo @endsection
@section('content')
    <form  action="{!!route('addentry', [])!!}" method="post" enctype="multipart/form-data" id="forma_id7" >

        {!! Form::token() !!}
        <div class="row">
            <div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
                {!! Form::label('filefield', 'Archivo')!!}
                <input type="file" name="filefield">
            </div>
            <div class="inner col-xs-12 col-sm-12 col-md-12 form-group">
                {!!Form::label('archivos_id', 'Ubicacion')!!}
                {!! Form::select('archivos_id', \App\Archivo::genlist()) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 submit form-group">
                {!!Form::submit('Subir', array('name'=>'submit', 'class'=>'btn btn-orange'))!!}
            </div>
        </div>


    </form>
    <h1>Lista de archivos</h1>
    <div class="row">
        <ul class="thumbnails">
            @foreach($entries as $entry)
                <?php /*<div class="col-md-2">
                    <div class="thumbnail">
                        <img src="{!!route('getentry', $entry->filename)!!}" alt="ALT NAME" class="img-responsive" />
                        <div class="caption">
                            <p></p>
                        </div>
                    </div>
                </div>*/?>
                <li>

				  {!!$entry->original_filename!!} - {!! Html::linkAction('FileEntryController@manejaArchivos', 'Procesar', array("filename"=>Crypt::encrypt($entry->filename))) !!}

				</li>
            @endforeach
			
        </ul>
    </div>
    <div>
        <?php /*
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Archivo</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Arbol</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Permisos</a></li>
            <li role="presentation"><a href="#grabar" aria-controls="messages" role="tab" data-toggle="tab">Grabar</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home"><h1>Archivo</h1>
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"><span id="archiiv">Archivo </span></span></div>
            <div role="tabpanel" class="tab-pane" id="profile"><h1>Arbol</h1>
                {!! Form::select('cat_id', \App\Archivo::genlist()) !!}

            </div>
            <div role="tabpanel" class="tab-pane" id="messages">Permisos</div>
            <div role="tabpanel" class="tab-pane" id="grabar">Grabar</div>
        </div>
    */?>
    </div>
    </div>
@endsection
