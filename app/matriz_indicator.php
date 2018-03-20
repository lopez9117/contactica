<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matriz_indicator extends Model
{


	protected $table ='matriz_indicators';


    protected $fillable = [
        'nombre', 'numerador', 'denominador','meta','user_id','area','frecuencia'];



     public function user()
    {
        return $this->belongsTo('User');
    }


     public static function nombresdeindicadores($id){
    	return matriz_indicator::where('id','=',$id)
    	->get();
    }
}
