<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    use SoftDeletes;
	
    protected $table = 'pratos';
    // public $timestamps = false;
    public $fillable = ['nome', 'categoria'];


    public function restaurante()
    {
        return $this->belongsTo('Restaurante');
    }

    public function categoria()
    {
        return $this->belongsTo('Categoria');
    }
}
