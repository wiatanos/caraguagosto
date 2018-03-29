<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\pratoValidator;
use App\Models\Prato;
use App\Models\Categoria;
use App\Models\Restaurante;


/**
*
*/
class pratoController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function index(){
    $data['url'] = 'prato';
    $data['method'] = 'POST';

     foreach (Categoria::all() as $key => $value) {
      $data['categorias'][$value['id']] = $value['nome'];
    }

    foreach (Restaurante::all() as $key => $value) {
      $data['restaurantes'][$value['id']] = $value['nome'];
    }

    return view('prato', compact('data'));
  }

  public function edit($id){
    $prato = Prato::find($id);

    $data['id'] = $id;
    $data['prato'] = $prato->nome;
    $data['restaurante'] = $prato->restaurante->id;
    $data['categoria'] = $prato->categoria->id;

    foreach (Categoria::all() as $key => $value) {
      $data['categorias'][$value['id']] = $value['nome'];
    }

    foreach (Restaurante::all() as $key => $value) {
      $data['restaurantes'][$value['id']] = $value['nome'];
    }


    $data['url'] = 'prato/update';

    return view('prato', compact('data'));
  }

  public function show(){
    if (Prato::all()->count() == 0) {
      return redirect('prato')->with('error', 'Nenhum Prato Cadastrado');
    }
   $data['titulo'] = 'Pratos';

   $data['table']['title'] = ['Prato', 'Restaurante'];

   foreach (Prato::all() as $key => $value) {
     $data['table']['dados'][] = [$value['nome'], $value->restaurante->nome, link_to('prato/'.$value['id'].'/edit', 'Editar', ['class' => 'btn btn-primary']), link_to('deletar/prato/'.$value->id, 'Deletar', ['class' => 'btn btn-danger'])];
   }

   return view('listar', compact('data'));
  }

  public function store(pratoValidator $request){
    try{
      $prato = new Prato;
      $prato->fill($request->all());
      $prato->save();

      return redirect('prato/listar')->with('success', 'Prato Cadastrado!');
    }catch (Exception $e){
      return $e;
    }
  }

  public function update(pratoValidator $request){
    Prato::find($request->get('id'))->fill($request->all())->update();
    return redirect('prato/listar')->with('success', 'Prato Atualizado!');
  }

  public function delete($id){
    Prato::find($id)->delete();

    return redirect('prato/listar')->with('success', 'Prato Excluido!');
  }
}