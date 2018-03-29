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
   $ativos = Restaurante::all();
   $inativos = Restaurante::onlyTrashed()->get();


   $data['table']['title'] = ['Nome', 'Codigo'];
  $data['titulo'] = 'Restaurantes';


    foreach ($ativos as $restaurante) {
     $data['table']['ativos'][] = [$restaurante['nome'], $restaurante['codigo'], link_to('restaurante/'.$restaurante['id'].'/edit', 'Editar', ['class' => 'btn btn-outline-primary']), link_to('deletar/restaurante/'.$restaurante->id, 'Deletar', ['class' => 'btn btn-outline-danger'])];
   }

    foreach ($inativos as $restaurante) {
     $data['table']['inativos'][] = [$restaurante['nome'], $restaurante['codigo'], link_to('restaurante/'.$restaurante['id'].'/ativar', 'Ativar', ['class' => 'btn btn-outline-success'])];
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

  return redirect('restaurante/show')->with('success', 'Restaurante Atualizado!');
}

public function delete($id){
  Restaurante::find($id)->pratos()->delete();
  Restaurante::find($id)->delete();

  return redirect('restaurante/show')->with('success', 'Restaurante Excluido!');
}
}