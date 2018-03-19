<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\restauranteInsert;
use App\Models\Restaurante;

class restauranteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrar(){
    	$data['url'] = 'restaurante/insert';
    	return view('restaurante', compact('data'));
    }

    public function editar($id){
       $restaurante['nome'] = Restaurante::find($id)->nome;
       $restaurante['codigo'] = Restaurante::find($id)->codigo;

        $data = array_merge($restaurante, ['url' => 'restaurante/update']);

    	return view('restaurante', compact('data'));
    }

    public function listar(){
       $restaurantes = Restaurante::all();


    $data['table']['title'] = ['Nome', 'Codigo'];
       foreach ($restaurantes as $restaurante) {
           $data['table']['dados'][] = [$restaurante['nome'], $restaurante['codigo'], '<a class="btn" href="restaurante/editar/'.$restaurante['id'].'">Editar</a>'];
       }

        return view('listar', compact('data'));
    }

    public function insert(restauranteInsert $request){
        try{
            $restaurante = new Restaurante;
            $restaurante->fill($request->all());
            $restaurante->save();

            return redirect('/')->with('status', 'Ae ae!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function update(restauranteInsert $request){
    	return $request;
    	return view('restaurante', compact('data'));
    }
}