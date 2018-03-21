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

    public function cadastrar(){

       foreach (Categoria::all() as $key => $value) {
            $data['categorias'][$value['id']] = $value['nome'];
       }

       foreach (Restaurante::all() as $key => $value) {
            $data['restaurantes'][$value['id']] = $value['nome'];
       }
       // return $data['categorias'];
    	$data['url'] = 'prato/insert';
    	return view('prato', compact('data'));
    }

    public function editar($id){
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

    public function listar(){
        $data['table']['title'] = ['Prato', 'Restaurante'];

        foreach (Prato::all() as $key => $value) {
           $data['table']['dados'][] = [$value['nome'], $value->restaurante->nome, link_to('prato/editar/'.$value['id'], 'Editar', ['class' => 'btn btn-primary'])];
        }

        return view('listar', compact('data'));
    }

    public function insert(Request $request){
        try{
            $prato = new Prato;
            $prato->fill($request->all());
            $prato->save();

            return redirect('prato/listar')->with('status', 'Sucesso my frind');
        }catch (Exception $e){
            return $e;
        }
    }

    public function update(pratoValidator $request){
      Prato::find($request->get('id'))->fill($request->all())->update();
    	return redirect('prato/listar')->with('status', 'Sucesso my frind');
    }
}