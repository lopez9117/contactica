<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matriz_indicator extends Model
{


protected $fillable = [
        'nombre', 'numerador', 'denominador','meta','user_id'];



     public function user()
    {
        return $this->belongsTo('User');
    }
}
