<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{

   function __construct(){

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {

        return view('home');
    }

    public function index()
    {

        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function destroy($id)
    {

        //Eliminando USuario
        DB::table('users')->where('id', $id)->delete();

        //Retornando Usuario
        return redirect()->route('usuarios');
    }

    public function create()
    {

        return view('usuarios.crearusuarios');

    }

    public function store(Request $request)
    {

        //Guardar el usuario

        //Guardar el usuario
        $imagen = $request->file('avatar');

        $ruta = '/dist/img/';

        $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();

        $imagen->move(getcwd() . $ruta, $nombre);

        //->move('public');

        DB::table('users')->insert([
            "name"       => $request->input('name'),
            "apellidos"  => $request->input('apellidos'),
            "pais"  => $request->input('pais'),
            "ciudad"  => $request->input('ciudad'),
            "email"      => $request->input('email'),
            "password"   => bcrypt($request->input('password')),
            "nombres"       => $request->input('name'),
            "ocupacion"  => $request->input('ocupacion'),
            "institucion"  => $request->input('institucion'),
            "ruta"       => $ruta . $nombre,
            "created_at" => Carbon::now(),
            "updated_at" => carbon::now(),
        ]);

        //Redireccionar

        return redirect()->route('usuarios');

    }

}
