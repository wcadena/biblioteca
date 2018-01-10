<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\PerfilPermiso;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Perfil::all();
        return view('perfil.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('perfil.create');
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
            'nombre_perfil'       => 'required',
            'tipo'       => 'required',
            //'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('perfil/create')
                ->withErrors($validator)
                ;
        } else {
            // store
            $nerd = new Perfil();
            $nerd->nombre_perfil       = \Input::get('nombre_perfil');
            $nerd->tipo      = \Input::get('tipo');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Perfil creado Satisfactoriamente!');
            return \Redirect::to('perfil');
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
        $nerd = Perfil::find($id);
        $perfil=PerfilPermiso::where('perfils_id', $nerd->id)->get();
        // show the view and pass the nerd to it
        $paso=array('nerd'=>$nerd,'perfil'=>$perfil);
        return \View::make('perfil.show')
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
        $nerd = Perfil::find($id);

        // show the edit form and pass the nerd
        return \View::make('perfil.edit')
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
            'nombre_perfil'       => 'required',
            'tipo'       => 'required',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('perfil/' . $id . '/edit')
                ->withErrors($validator)
                //->withInput(\Input::except('password'))
                ;
        } else {
            // store
            $nerd = Perfil::find($id);
            $nerd->nombre_perfil       = \Input::get('nombre_perfil');
            $nerd->tipo      = \Input::get('tipo');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Perfil Actualizado satisfactoriamente!');
            return \Redirect::to('perfil');
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
        $nerd = Perfil::find($id);
        $nerd->delete();

        // redirect
        \Session::flash('message', 'Borrado de Carpeta!');
        return \Redirect::to('perfil');
    }
}
