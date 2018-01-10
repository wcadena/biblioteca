<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
            'permiso'       => 'required',
            'archivos_id'       => 'required|numeric',
            'tipo'      => 'required',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->with('error', 'Campos Incompletos!');
        } else {
            // store
            $nerd = new Permiso();
            $nerd->archivos_id       = \Input::get('archivos_id');
            $nerd->permiso      = \Input::get('permiso');
            $nerd->tipo = \Input::get('tipo');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Permiso creado Satisfactoriamente!');
           // return \Redirect::to('archivos');
            return redirect()->back()->with('message', 'Permiso creado Satisfactoriamente!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        $nerd = Permiso::find($id);
        $nerd->delete();

        // redirect
        \Session::flash('message', 'Borrado de Permiso!');
        return redirect()->back()->with('message', 'Permiso borrado Satisfactoriamente!');
    }
}
