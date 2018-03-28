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

    public function index(){
    	$data['url'] = 'restaurante';
        $data['method'] = 'POST';

        return view('restaurante', compact('data'));
    }

    public function edit($id){
        $data['method'] = 'PUT';
        $data['url'] = 'restaurante/'.$id;
       $data['id'] = $id;
       $data['nome'] = Restaurante::find($id)->nome;
       $data['codigo'] = Restaurante::find($id)->codigo;

       return view('restaurante', compact('data'));
   }

   public function show(){
       $restaurantes = Restaurante::all();

       $data['titulo'] = 'Restaurantes';
       $data['table']['title'] = ['Nome', 'Codigo'];
       foreach ($restaurantes as $restaurante) {
           $data['table']['dados'][] = [$restaurante['nome'], $restaurante['codigo'], link_to('restaurante/'.$restaurante['id'].'/edit', 'Editar', ['class' => 'btn btn-primary'])];
       }

       return view('listar', compact('data'));
   }

   public function store(restauranteValidator $request){
    try{
        $restaurante = new Restaurante;
        $restaurante->fill($request->all());
        $restaurante->save();

        return redirect('restaurante/listar')->with('success', 'Restaurante Cadastrado!');
    }catch (Exception $e){
        return $e;
    }
}

public function update(restauranteValidator $request){
    Restaurante::find($request->get('id'))->fill($request->all())->update();
    $data['url'] = 'restaurante/insert';

    return redirect('restaurante/listar')->with('success', 'Restaurante Atualizado!');
}
}