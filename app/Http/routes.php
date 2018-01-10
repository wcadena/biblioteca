<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
*rutas subir archivos
*/
Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::get('fileentry/down/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@down']);
Route::post('fileentry/add',[
    'as' => 'addentry', 'uses' => 'FileEntryController@add']);
Route::get('fileentry/arbol/{filename}', 'FileEntryController@manejaArchivos');

Route::post('comment/add', 'FileEntryController@addComment');//para el ajax

/*
 * para los archivos
 */
Route::resource('archivos', 'ArchivoController');
//Route::get('archivos', 'FileEntryController@indexArchivos');
Route::get('archivos/json/{filename}', 'FileEntryController@indexArchivosJson');
Route::get('archivosedit', 'FileEntryController@update');
/*
 * fin para los archivos
 */
/**
 * para los permisos
 */
Route::resource('permisos', 'PermisoController');
Route::resource('perfil_permiso', 'PerfilPermisoController');
/**
 * fin de los permisos
 */
/*
 * este es otro upload
 */
Route::get('fileentry/multiple', 'FileEntryController@manejaArchivosMultiple');
Route::get('fileentry/dropzone', 'FileEntryController@manejaArchivosDropzone');

/**
 * para permisos
 */
Route::resource('perfil', 'PerfilController');
Route::resource('usuario', 'UsuarioController');
/**
 * fin permisos
 */
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'WelcomeController@index');
Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');