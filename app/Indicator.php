<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    //



protected $fillable = [
        'id', 'nombre', 'numerador', 'denominador','resultado','nombre_del_numerador','nombre_del_denominador','año','mes','comentario','user_id'];


    public function propietario(){

    	return $this->belongsTo('App\User');

    }


  
    
}
