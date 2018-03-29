<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoriaValidator;
use App\Models\Categoria;

/**
*
*/
class categoriaController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
    	$data['url'] = 'categoria';
        $data['method'] = 'POST';
    	return view('categoria', compact('data'));
    }

    public function edit($id){
        $data['method'] = 'PUT';
        $data['id'] = $id;
        $data['nome'] = Categoria::find($id)->nome;
        $data['url'] = 'categoria/'.$id;

        return view('categoria', compact('data'));
    }

    public function show(){
     $ativos = Categoria::all();
     $inativos = Categoria::onlyTrashed()->get();

     $data['titulo'] = 'Categorias';
     $data['table']['title'] = ['Nome'];
     foreach ($ativos as $categoria) {
         $data['table']['ativos'][] = [$categoria['nome'], $categoria['codigo'], link_to('categoria/'.$categoria['id'].'/edit', 'Editar', ['class' => 'btn btn-outline-primary']), link_to('deletar/categoria/'.$categoria->id, 'Deletar', ['class' => 'btn btn-outline-danger'])];
     }

     foreach ($inativos as $categoria) {
         $data['table']['inativos'][] = [$categoria['nome'], $categoria['codigo'], link_to('ativar/categoria/'.$categoria['id'], 'Ativar', ['class' => 'btn btn-outline-primary'])];
     }

     return view('listar', compact('data'));
 }

 public function store(categoriaValidator $request){
    try{
        $categoria = new Categoria;
        $categoria->fill($request->all());
        $categoria->save();

        return redirect('categoria/show')->with('success', 'Categoria Cadastrada!');
    }catch (Exception $e){
        return $e;
    }
}

public function update(categoriaValidator $request){
    Categoria::find($request->get('id'))->fill($request->all())->update();
    return redirect('categoria/listar')->with('success', 'Categoria Atualizada!');
}

public function delete($id){
    Categoria::find($id)->pratos()->delete();
    Categoria::find($id)->delete();

    return redirect('categoria/show')->with('success', 'Categoria Excluida!');
  }
}