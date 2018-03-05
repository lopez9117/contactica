<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\User;
use App\matriz_indicator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    

function __construct(){

        $this->middleware('auth');
    }


   public function mapageneral()
    {
        return view('score.mapageneral');

        //
    }


   public function crearindicadores()
    {

        $usuarios = User::all();

       $indicators = matriz_indicator::all();

       // $user = User::find(1);
       //  $friends_votes = $user->friends()
       //       ->with('user') // bring along details of the friend
       //      ->join('votes', 'votes.user_id', '=', 'friends.friend_id')
       //     ->get(['votes.*']); // exclude extra details from friends table



        return view('score.crearindicadores',compact('usuarios','indicators'));

        //
    }

     public function informeindicadores()
    {
        return view('score.informeindicadores');

        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('score.crearindicador');

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $usuario = Auth::user();

        //$usuario->

        $indicadores = $usuario->indicadores;
        return view('score.create', compact('indicadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request3
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuario = Auth::user();

        

        $imagen = $request->file('avatar');

        $ruta = '/dist/img/';

        $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();

        $imagen->move(getcwd() . $ruta, $nombre);

        //Guardar el mensaje
        DB::table('indicators')->insert([
            "nombre"                 => $request->input('nombre'),
            "nombre_del_numerador"   => $request->input('nombre_del_numerador'),
            "nombre_del_denominador" => $request->input('nombre_del_denominador'),
            "numerador"              => $request->input('numerador'),
            "denominador"            => $request->input('denominador'),
            "resultado"              => ($request->input('numerador') * 100) / $request->input('denominador'),
            "año"                    => $request->input('año'),
            "mes"                    => $request->input('mes'),
            "comentario"             => $request->input('comentario'),
            "user_id"                => $usuario->id,
            "ruta"                   => $ruta . $nombre,
            "created_at"             => Carbon::now(),
            "updated_at"             => carbon::now(),
        ]);

        //Redireccionar
        return redirect()->route('create');

        //RETURN $request->all();

    }

    public function indicadoresestore(Request $request){

         DB::table('matriz_indicators')->insert([
            "nombre"                 => $request->input('nombre'),
            "numerador"              => $request->input('numerador'),
            "denominador"            => $request->input('denominador'),
            "meta"                   => $request->input('meta'),
            "user_id"                => $request->input('usuario'),
            "created_at"             => Carbon::now(),
            "updated_at"             => carbon::now(),
        ]);

        //Redireccionar
        return redirect()->route('crearindicadores');
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
        //eliminando indicador

        DB::table('indicators')->where('id', $id)->delete();

        //retornando a los indicadores
        return redirect()->route('create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function administrar()
    {
        return view('score.administrar');
    }

    public function enero()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '1'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function febrero()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '2'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function marzo()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '3'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function abril()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '4'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function mayo()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '5'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function junio()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '6'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }
    public function julio()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '7'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function agosto()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '8'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function septiembre()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '9'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function octubre()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '10'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function noviembre()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '11'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }

    public function diciembre()
    {

        $usuario = Auth::user();

        $indicadores = DB::table('users')
            ->join('indicators', 'users.id', '=', 'indicators.user_id')
            ->select('indicators.*')->where([
            ['indicators.mes', '=', '12'],
            ['users.id', '=', $usuario->id]])->get();

        return view('score.create', compact('indicadores'));
    }
}
