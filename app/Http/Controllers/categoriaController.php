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

    public function cadastrar(){
    	$data['url'] = 'categoria/insert';
    	return view('categoria', compact('data'));
    }

    public function editar($id){
        $categoria['id'] = $id;
       $categoria['nome'] = Categoria::find($id)->nome;

        $data = array_merge($categoria, ['url' => 'categoria/update']);

    	return view('categoria', compact('data'));
    }

    public function listar(){
       $categorias = categoria::all();


    $data['table']['title'] = ['Nome'];
       foreach ($categorias as $categoria) {
           $data['table']['dados'][] = [$categoria['nome'], $categoria['codigo'], link_to('categoria/editar/'.$categoria['id'], 'Editar', ['class' => 'btn btn-primary'])];
       }

        return view('listar', compact('data'));
    }

    public function insert(Request $request){
        try{
            $categoria = new Categoria;
            $categoria->fill($request->all());
            $categoria->save();

            return redirect('/')->with('status', 'Ae ae!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function update(categoriaValidator $request){
        Categoria::find($request->get('id'))->fill($request->all())->update();
    	return redirect('categoria/listar')->with('status', 'Sucesso my friend!');
    }
}