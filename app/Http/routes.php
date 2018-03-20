<?php

use App\State;
use App\Town;

use Illuminate\Support\Facades\Input;

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

Route::get('/', function () {
    return view('auth.login');
});




//Rutads Dedicadas  a gestion de suarios
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('home', ['as' => 'home', 'uses' => 'UsersController@home']);
Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'UsersController@index']);
Route::delete('usuarios/{id}', ['as' => 'usuarios.destroy', 'uses' => 'UsersController@destroy']);
Route::get('crearusuario', ['as' => 'crearusuario', 'uses' => 'UsersController@create']);
Route::post('guardarusuario', ['as' => 'guardarusuario', 'uses' => 'UsersController@store']);
/*Route::get('api/users' ,function(){
return Datatables::eloquent(App\User::query())->make(true);
});*/

//Rutas Dedicadas a el Score Card
Route::get('indicator', ['as' => 'indicator', 'uses' => 'ScoreController@index']);

Route::get('indicator1', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator1']);
Route::get('indicator2', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator2']);
Route::get('indicator3', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator3']);
Route::get('indicator4', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator4']);
Route::get('indicator5', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator5']);
Route::get('indicator6', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator6']);
Route::get('indicator7', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator7']);
Route::get('indicator8', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator8']);
Route::get('indicator9', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator9']);
Route::get('indicator10', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator10']);
Route::get('indicator11', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator11']);
Route::get('indicator12', ['as' => 'indicator1', 'uses' => 'ScoreController@indicator12']);

Route::get('mapageneral', ['as' => 'mapageneral', 'uses' => 'ScoreController@mapageneral']);
Route::get('mapadeprocesos', ['as' => 'mapadeprocesos', 'uses' => 'ScoreController@mapadeprocesos']);
Route::get('crearindicadores', ['as' => 'crearindicadores', 'uses' => 'ScoreController@crearindicadores']);
Route::post('crearindicadores', ['as' => 'crearindicadores.store', 'uses' => 'ScoreController@indicadoresestore']);
Route::get('informeindicadores', ['as' => 'informeindicadores', 'uses' => 'ScoreController@informeindicadores']);


Route::get('create', ['as' => 'create', 'uses' => 'ScoreController@create']);
Route::post('create', ['as' => 'create.store', 'uses' => 'ScoreController@store']);

Route::delete('create/{id}', ['as' => 'create.destroy', 'uses' => 'ScoreController@destroy']);
Route::delete('score/{id}', ['as' => 'score.destroy', 'uses' => 'ScoreController@destroymatriz']);
Route::get('editar/{id}', 'ScoreController@editar');
Route::post('score.update',  ['as' => 'score.update', 'uses' =>'ScoreController@update']);
Route::get('ajax-nombreindicadores/{id}', 'ScoreController@getnombresindicadores');






//rutas para seleccionar los indicadores de cada mes

Route::get('cargarenero', ['as' => 'cargarenero', 'uses' => 'ScoreController@enero']);
Route::get('cargarfebreo', ['as' => 'cargarfebreo', 'uses' => 'ScoreController@febrero']);
Route::get('cargarmarzo', ['as' => 'cargarmarzo', 'uses' => 'ScoreController@marzo']);
Route::get('cargarabril', ['as' => 'cargarabril', 'uses' => 'ScoreController@abril']);
Route::get('cargarmayo', ['as' => 'cargarmayo', 'uses' => 'ScoreController@mayo']);
Route::get('cargarjunio', ['as' => 'cargarjunio', 'uses' => 'ScoreController@junio']);
Route::get('cargarjulio', ['as' => 'cargarjulio', 'uses' => 'ScoreController@julio']);
Route::get('cargaragosto', ['as' => 'cargaragosto', 'uses' => 'ScoreController@agosto']);
Route::get('cargarseptiembre', ['as' => 'cargarseptiembre', 'uses' => 'ScoreController@septiembre']);
Route::get('cargaroctubre', ['as' => 'cargaroctubre', 'uses' => 'ScoreController@octubre']);
Route::get('cargarnoviembre', ['as' => 'cargarnoviembre', 'uses' => 'ScoreController@noviembre']);
Route::get('cargardiciembre', ['as' => 'cargardiciembre', 'uses' => 'ScoreController@diciembre']);

Route::get('administrar', ['as' => 'administrar', 'uses' => 'ScoreController@administrar']);



//Rutas del calendario
Route::get('calendar', function () {
  $states = State::all();
   return view('calendar.home', compact('states'));
});


Route::get('ajax-centrodecostos/{id}', 'CalendarController@getcentrodecostos');


Route::get('cargaEventos{id?}','CalendarController@index');

Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));

Route::post('guardaEventossinajax', array('as' => 'guardaEventossinajax','uses' => 'CalendarController@createsinajax'));

Route::post('actualizaEventos','CalendarController@update');
Route::post('eliminaEvento','CalendarController@delete');