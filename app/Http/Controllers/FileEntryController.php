<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Http\Controllers\Controller;
use App\Fileentry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class FileEntryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $entries = Fileentry::all();
        //dd(Archivo::genlist());
        return view('fileentries.index', compact('entries'));
    }
	
    public function add() {
        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
        $entry->email=Auth::user()->email;
        $entry->save();
        $archuivo = trim(Request::input('archivos_id'));
        //if($archuivo=="'1'"){echo 'igual';}
        //dd($archuivo);
        self::addArchivo($file->getClientOriginalName(),2);
        return redirect('fileentry');
    }
    public function addArchivo($archivoUniq,$raiz){
        $count = Archivo::where('nombre', '=', $archivoUniq)->count();
        $archivo = new Archivo();
        if ($count == 0) {
            $archivo->nombre = $archivoUniq;
            $archivo->identificacion = 'Nuevo';
            $archivo->tipo = 'archivo';
            $archivo->email=Auth::user()->email;
            $archivo->archivos_id=$raiz;
            $archivo->save();
        }else{
            $archivo = Archivo::where('nombre', '=', $archivoUniq)->firstOrFail();
            $archivo->identificacion = 'Actualizado:'.Carbon::now().';';
            $archivo->email=Auth::user()->email;
            $archivo->archivos_id=$raiz;
            $archivo->save();
        }
    }

    public function get($filename){
        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }
    public function down($filename){
        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        $headers = array(
            'Content-Type: '.$entry->mime,
        );

        return response()->download($storagePath.$entry->filename, $entry->original_filename, $headers);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }
	/*
	*para manejar los archivos
	*/
	public function manejaArchivos($filename)
    {
		//dd($filename);
        $archivoUniq = \Crypt::decrypt($filename);
        $msj="En proceso";
        $msj2="Procesado";
/*
        $count = Archivo::where('nombre', '=', $archivoUniq)->count();
        $archivo = new Archivo();
        if ($count == 0) {
        $archivo->nombre = $archivoUniq;
        $archivo->identificacion = $msj;
		
        $archivo->save();
        }else{
            $archivo = Archivo::where('nombre', '=', $archivoUniq)->firstOrFail();
            $archivo->identificacion = $msj;
            $archivo->save();
        }
        $file = Storage::disk('local')->get($archivoUniq);
        $total=explode("\r", trim($file));
        $tabla=array();
        $firstLine=array();
        $cont=0;*/
		return redirect('fileentry');
	}
    public function manejaArchivosMultiple()
    {
        return view('fileentries.up');
    }
    public function manejaArchivosDropzone()
    {
        return view('fileentries.dropZone');
    }

    public function addComment()
    {
        $this->layout = null;
        //check if its our form
        if(Request::ajax()){
            $name = Input::get( 'name' );
            $content = Input::get( 'message' );

            $comment = new Comment();
            $comment->author =  $name;
            $comment->comment_content = $content;
            $comment->save();

            $postComment = new CommentPost();
            $postComment->post_id = Input::get('post_id');
            $postComment->comment_id = Comment::max('id');
            $postComment->save();

            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
            );
            return 'yea';
        }else{
            return 'no';
        }
    }

    public function indexArchivos()
    {
        $entries = Archivo::where('tipo', 'rama')->orderBy('archivos_id', 'asc')->orderBy('id', 'asc')->get();
        //dd(Archivo::genlist());
        //return response()->json($entries);
        return view('archivos.index', compact('entries'));
    }
    public function indexArchivosJson($filename)
    {
        $entries = Archivo::where('archivos_id', $filename)->where('tipo', 'rama')->orderBy('archivos_id', 'asc')->orderBy('id', 'asc')->get();
        //dd(Archivo::genlist());
        return response()->json($entries);
        //return view('archivos.index', compact('entries'));
    }
    public function update()
    {
        $id = trim(Request::input('asdft6_id'));
        $nombre = trim(Request::input('asdft6_nombre'));
        $count = Archivo::where('id', '=', $id)->count();
        $archivo = new Archivo();
        if ($count == 0) {
            /*$archivo->nombre = $nombre;
            $archivo->email=Auth::user()->email;
            $archivo->save();*/
        }else{
            $archivo = Archivo::where('id', '=', $id)->firstOrFail();
            $archivo->identificacion = 'Actualizado:'.Carbon::now().';';
            $archivo->email=Auth::user()->email;
            $archivo->nombre = $nombre;
            $archivo->save();
        }
        $entries = Archivo::where('tipo', 'rama')->orderBy('archivos_id', 'asc')->orderBy('id', 'asc')->get();
        //dd(Archivo::genlist());
        //return response()->json($entries);
        return view('archivos.index', compact('entries'));
    }
}