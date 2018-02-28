<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Fullcalendarevento;

use App\Http\Requests;
use App\Town;
use App\State;
use App\User;

use DB;

use Carbon\Carbon;

class CalendarController extends Controller
{

public function index()
    {

        $usuario = Auth::User();

         $idusuario= $usuario->id;

        
       $data = array(); //declaramos un array principal que va contener los datos
       $id = Fullcalendarevento::where('usuario', $idusuario)->lists('id'); //listamos todos los id de los eventos
        $titulo =     Fullcalendarevento::where('usuario', $idusuario)->lists('titulo'); //lo mismo para lugar y fecha
        $fechaIni =   Fullcalendarevento::where('usuario', $idusuario)->lists('fechaIni');
        $fechaFin =   Fullcalendarevento::where('usuario', $idusuario)->lists('fechaFin');
        $allDay =     Fullcalendarevento::where('usuario', $idusuario)->lists('todoeldia');
        $background = Fullcalendarevento::where('usuario', $idusuario)->lists('color');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
 
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
 
        json_encode($data); //convertimos el array principal $data a un objeto Json 
       return $data; //para luego retornarlo y estar listo para consumirlo
    }

   


    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];

        //Insertando evento a base de datos
        $evento=new Fullcalendarevento;
        $evento->fechaIni=$start;
        //$evento->fechaFin=$end;
        $evento->todoeldia=true;
        $evento->color=$back;
        $evento->titulo=$title;

        $evento->save();
   }

     public function createsinajax(Request $request){

            
            // $diaactual = Carbon::now()->format('y-m-d');

             $start = $request->input('start2');
             $usuario = Auth::User();

             //dd($start);
             //$diaactual->toDateString();

            $fechainicia = $start.' '.$request->input('horainicio');
            $fechafinal  = $start.' '.$request->input('horafin');

            //var_dump($fechainicia);

          // echo  fechainicia;
            //echo  fechafinal;

        if($request->isMethod('POST')){

            //Guardar actividad
             

             DB::table('fullcalendareventos')->insert([

            "fechaIni" => $fechainicia,
            "fechaFin" => $fechafinal,
            "titulo" => $request->input('cliente'),
            "usuario" =>$usuario->id,
            "centrodecostos" => $request->input('centrodecostos'),
            "actividad" => $request->input('actividad'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

                  ]);


             $states = State::all();
             $towns = Town::all();
             return view('calendar.home', compact('states','towns'));

        
  }
}
   public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];

        $evento=Fullcalendarevento::find($id);
        if($end=='NULL'){
            $evento->fechaFin=NULL;
        }else{
            $evento->fechaFin=$end;
        }
        $evento->fechaIni=$start;
        $evento->todoeldia=$allDay;
        $evento->color=$back;
        $evento->titulo=$title;
        //$evento->fechaFin=$end;

        $evento->save();
   }

   public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        Fullcalendarevento::destroy($id);
   }

    //
}
