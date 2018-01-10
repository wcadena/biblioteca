<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Permiso;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;

class ArchivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Archivo::where('tipo', 'rama')->
        where('archivos_id', '1')->
        orderBy('archivos_id', 'asc')->orderBy('id', 'asc')->get();
        //dd(Archivo::genlist());
        //return response()->json($entries);
        //////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////////////////////////////////////////////////////////////
        return view('archivos.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre'       => 'required',
            'archivos_id'       => 'required|numeric',
            //'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('archivos/create')
                ->withErrors($validator)
                ;
        } else {
            // store
            $nerd = new Archivo();
            $nerd->nombre       = \Input::get('nombre');
            $nerd->archivos_id      = \Input::get('archivos_id');
            $nerd->identificacion = 'Creado: '.Carbon::now().';';
            $nerd->email=Auth::user()->email;
            $nerd->tipo = \Input::get('tipo');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Archivo creado Satisfactoriamente!');
            return \Redirect::to('archivos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the nerd
        $nerd = Archivo::find($id);
        $archivos=Archivo::where('archivos_id', $nerd->id)->where('tipo', 'archivo')->get();
        $permiso=Permiso::where('archivos_id', $nerd->id)->get();
        // show the view and pass the nerd to it
        $paso=array('nerd'=>$nerd,'archivo'=>$archivos,'permiso'=>$permiso);
        return \View::make('archivos.show')
            ->with('paso', $paso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $nerd = Archivo::find($id);

        // show the edit form and pass the nerd
        return \View::make('archivos.edit')
            ->with('nerd', $nerd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre'       => 'required',
            'archivos_id'       => 'required|numeric',
            'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('archivo/' . $id . '/edit')
                ->withErrors($validator)
                //->withInput(\Input::except('password'))
                ;
        } else {
            // store
            $nerd = Archivo::find($id);
            $nerd->nombre       = \Input::get('nombre');
            $nerd->archivos_id      = \Input::get('archivos_id');
            $nerd->identificacion = 'Actualizado:'.Carbon::now().';';
            $nerd->email=Auth::user()->email;
            $nerd->tipo = \Input::get('tipo');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Archivo Actualizado satisfactoriamente!');
            return \Redirect::to('archivos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $nerd = Archivo::find($id);
        $nerd->delete();

        // redirect
        \Session::flash('message', 'Borrado de Carpeta!');
        return \Redirect::to('archivos');
    }
}
