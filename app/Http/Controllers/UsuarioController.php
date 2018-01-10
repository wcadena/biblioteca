<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
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
        $entries = User::all();
        return view('usuario.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('usuario.create');
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
            'name'       => 'required',
            'empresa'       => 'required',
            'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('usuario/create')
                ->withErrors($validator)
                ;
        } else {
            // store
            $nerd = new User();
            $nerd->name       = \Input::get('name');
            $nerd->empresa      = \Input::get('empresa');
            $nerd->email = \Input::get('email');
            $nerd->password= bcrypt(\Input::get('password'));
            $nerd->role = \Input::get('role');
            $nerd->save();

            // redirect
            \Session::flash('message', 'User creado Satisfactoriamente!');
            return \Redirect::to('usuario');
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
        $nerd = User::find($id);
        $usuario=User::where('usuario_id', $nerd->id)->where('tipo', 'archivo')->get();
        // show the view and pass the nerd to it
        $paso=array('nerd'=>$nerd,'archivo'=>$usuario);
        return \View::make('usuario.show')
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
        $nerd = User::find($id);

        // show the edit form and pass the nerd
        return \View::make('usuario.edit')
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
            'name'       => 'required',
            'empresa'       => 'required|',
            'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('usuario/' . $id . '/edit')
                ->withErrors($validator)
                //->withInput(\Input::except('password'))
                ;
        } else {
            // store
            $nerd = User::find($id);
            $nerd->name       = \Input::get('name');
            $nerd->empresa      = \Input::get('empresa');
            $nerd->email = \Input::get('email');
            $nerd->password= bcrypt(\Input::get('password'));
            $nerd->role = \Input::get('role');
            $nerd->save();

            // redirect
            \Session::flash('message', 'User Actualizado satisfactoriamente!');
            return \Redirect::to('usuario');
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
        $nerd = User::find($id);
        $nerd->delete();

        // redirect
        \Session::flash('message', 'Borrado de Usuario!');
        return \Redirect::to('usuario');
    }
}
