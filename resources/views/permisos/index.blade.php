@extends('app')
@section('titulo')Todas las Carpetas @endsection

@section('content')

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation"  class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tabla</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Arbol</a></li>
            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Opciones</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="profile"><div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Todas las Carpetas</h3>
                        <div class="box-tools">
                            <div class="input-group">
                                <a href="{!! URL::to('archivos/create')!!}" class=".btn.btn-app">Nueva Carpeta</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <!--<td>id</td>
                                <td>padre</td>-->
                                <td>Nombre</td>
                                <!--<td>Tipo</td>
                                <td>Identificacion</td>
                                -->
                                <td>Acciones</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entries as $key => $value)
                                <?php $value->tipo=''; ?>
                                @include('archivos._arbol', $value)
                            @endforeach
                            </tbody>
                        </table>
                        <ul id="menu">
                        </ul>




                    </div>
                </div></div>
            <div role="tabpanel" class="tab-pane" id="messages"><div class="box">
                    <form  action="archivosedit" method="get" id="forma_id7" >
                        {!! Form::hidden( 'asdft6_id','',['id'=>'asdft6_id']) !!}
                        {!! Form::input('text', 'asdft6_nombre','',['id'=>'asdft6_nombre']) !!}
                        {!! Form::token() !!}
                        {!! Form::submit('Editar nombre', array('class' => 'btn btn-warning')) !!}
                    </form>
                    <div id="details"></div>
                </div></div>
            <div role="tabpanel" class="tab-pane" id="home"><div class="box"></div></div>
        </div>

    </div>






@endsection

@section('scriptEspecialFinal')<script>
    function up_arbol(id,val){
        //alert($('#asdft6_nombre').val());
        $('#asdft6_id').val(id);
        $('#asdft6_nombre').val(val);
    }
    function arbol(raiz){
        $.getJSON("/archivos/json/"+raiz, function (data) {
            var items = [];
            $.each(data, function (key, val) {
                $.each(val, function (key, val) {
                    //console.log( JSON.stringify(val, null, 2) );
                    if(key=='nombre'){
                        items.push("<li id='" + key + "'>" + val + "</li>");
                    }
                });
            });
            //alert(items);
            $("<ul/>", {
                "class": "my-new-list",
                html: items.join("")
            }).appendTo("#menu");
            return items;
        });
    }
    //arbol(1);



    //http://biblioteca.com/archivos/json/1
    //alert(0);

    //var obj = {x: 1, y: 2, z: 3};

    //console.log( JSON.stringify(obj, null, 2) ); // spacing level = 2

    function arbolUL(raiz, elemento){

        var html = '<ul>';
        $.getJSON("/archivos/json/"+raiz, function (data) {
            if((data.length)!=0){
                var items = [];
                $.each(data, function (key, val) {
                    var auxws22="";
                    var accino22s="";
                    var idauxy6y="-1"
                    $.each(val, function (key, val) {
                        //console.log( JSON.stringify(val, null, 2) );
                        if(key=='id'){
                            var aux34a="arbolUL("+val+", '#acts_"+val+"')";
                            idauxy6y=val;
                            auxws22 += "<span id='arbol_x" + val + "'>" +'<a href="javascript:'+aux34a+'">+</a><span id="acts_'+val+'">-</span>'     + "</span>";
                        }
                        if(key=='nombre'){
                            var aux668='"'+val+'"';
                            accino22s+=" <a href='javascript:up_arbol("+idauxy6y+","+aux668+")'>Editar</a>";
                            html += "<li id='" + key + "'>" + val +accino22s+auxws22+ "</li>";
                        }
                    });
                });
                //alert(items);
                html += '</ul>';
                //alert(html);
                $(elemento).html(html);
                //alert(1);
            }else{
                $(elemento).html('Nuevo');
            }
        });
    }
    arbolUL(1, '#details');
</script> @endsection