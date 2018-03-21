<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\restauranteValidator;
use App\Models\Restaurante;

class restauranteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrar(){
    	$data['url'] = 'restaurante/insert';
    	return view('restaurante', compact('data'));
    }

    public function editar($id){
       $restaurante['id'] = $id;
       $restaurante['nome'] = Restaurante::find($id)->nome;
       $restaurante['codigo'] = Restaurante::find($id)->codigo;

        $data = array_merge($restaurante, ['url' => 'restaurante/update']);

    	return view('restaurante', compact('data'));
    }

    public function listar(){
       $restaurantes = Restaurante::all();


    $data['table']['title'] = ['Nome', 'Codigo'];
       foreach ($restaurantes as $restaurante) {
           $data['table']['dados'][] = [$restaurante['nome'], $restaurante['codigo'], link_to('restaurante/editar/'.$restaurante['id'], 'Editar', ['class' => 'btn btn-primary'])];
       }

        return view('listar', compact('data'));
    }

    public function insert(restauranteValidator $request){
        try{
            $restaurante = new Restaurante;
            $restaurante->fill($request->all());
            $restaurante->save();

            return redirect('restaurante/listar')->with('status', 'Sucesso my friend!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function update(restauranteValidator $request){
        Restaurante::find($request->get('id'))->fill($request->all())->update();
        $data['url'] = 'restaurante/insert';

        return redirect('restaurante/listar')->with('status', 'Sucesso my friend!');
    }
}