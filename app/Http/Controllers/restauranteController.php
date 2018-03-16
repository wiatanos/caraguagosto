<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class restauranteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrar(){
    	$data['url'] = 'inser/restaurante';
    	return view('restaurante', compact('data'));
    }

    public function editar(){
    	$data['url'] = 'inser/restaurante';
    	return view('restaurante', compact('data'));
    }

    public function insert(){
    	return Input::all();
    }

    public function update(){
    	$data['url'] = 'inser/restaurante';
    	return view('restaurante', compact('data'));
    }
}