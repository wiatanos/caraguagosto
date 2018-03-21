<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Prato extends Model
{
    use SoftDeletes;
	
    protected $table = 'pratos';
    // public $timestamps = false;
    public $fillable = ['nome', 'categoria', 'categoria_id', 'restaurante_id'];


    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
}
