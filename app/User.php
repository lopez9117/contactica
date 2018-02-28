<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombres', 'apellidos', 'pais', 'ciudad', 'institucion', 'ocupacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      
public function indicadores(){

    return $this->hasMany('App\Indicator');
}

public function calendarios(){

    return $this->hasMany('App\Fullcalendareveto');
}





}
