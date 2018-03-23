<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;


class Votacao extends Model
{
    use SoftDeletes;
    
    protected $table = 'votacoes';
    // public $timestamps = false;
    public $fillable = ['nome', 'email', 'cpf', 'prato', 'sabor', 'ambiente', 'restaurante_codigo'];

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante', 'restaurante_codigo', 'codigo');
    }

}
