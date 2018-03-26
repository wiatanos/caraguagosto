<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model
{
	use SoftDeletes;
	
    protected $table = 'restaurantes';
    // public $timestamps = false;
    public $fillable = ['nome', 'codigo'];

    public function pratos()
    {
        return $this->hasMany('App\Models\Prato');
    }

}
