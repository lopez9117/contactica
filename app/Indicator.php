<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    //
protected $table ='indicators';


protected $fillable = [
        'id', 'nombre', 'numerador', 'denominador','resultado','nombre_del_numerador','nombre_del_denominador','año','mes','comentario','user_id','area','meta'];


    public function propietario(){

    	return $this->belongsTo('App\User');

    }


  
    
}
