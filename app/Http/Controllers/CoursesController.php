<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class CoursesController extends Controller
{
    //

	function __construct(){

		$this->middleware('auth');
	}



	public function index(){

		 //= \App\courses::all(); 
 
		$courses = DB::table('courses')->get();
		 return view('cursos.cursos', compact('courses'));
	
	}

    
}
