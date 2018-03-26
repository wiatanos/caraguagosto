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
    public $fillable = ['apresentacao', 'sabor', 'ambiente', 'restaurante_codigo', 'prato_id', 'pessoa_id'];

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante', 'restaurante_codigo', 'codigo');
    }

    public function prato()
    {
        return $this->belongsTo('App\Models\Prato');
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }

}
