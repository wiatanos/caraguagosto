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
class votacaoController extends BaseController
{
	
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
    	return view('votacao');
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
}