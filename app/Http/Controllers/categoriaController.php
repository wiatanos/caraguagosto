<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoriaInsert;
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
       $categoria['nome'] = Categoria::find($id)->nome;

        $data = array_merge($categoria, ['url' => 'categoria/update']);

    	return view('categoria', compact('data'));
    }

    public function listar(){
       $categorias = categoria::all();


    $data['table']['title'] = ['Nome', 'Codigo'];
       foreach ($categorias as $categoria) {
           $data['table']['dados'][] = [$categoria['nome'], $categoria['codigo'], '<a class="btn" href="categoria/editar/'.$categoria['id'].'">Editar</a>'];
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

    public function update(categoriaInsert $request){
    	return $request;
    	return view('categoria', compact('data'));
    }
}