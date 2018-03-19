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

    public function editar(){
    	$data['url'] = 'inser/restaurante';
    	return view('restaurante', compact('data'));
    }

    public function insert(restauranteInsert $request){
        $this->validate($request, [
            'codigo' => 'required| unique:restaurantes',
        ]);
        
        try{
            $restaurante = new Restaurante;
            $restaurante->fill($request->all());
            $restaurante->save();

            return redirect('/')->with('status', 'Ae ae!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function update(){
    	$data['url'] = 'inser/restaurante';
    	return view('restaurante', compact('data'));
    }
}