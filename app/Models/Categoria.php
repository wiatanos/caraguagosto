<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
	
    protected $table = 'categorias';
    // public $timestamps = false;
    public $fillable = ['nome'];


    public function restaurantes()
    {
        return $this->hasMany('Restaurante');
    }
}


