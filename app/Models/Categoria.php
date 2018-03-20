<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


