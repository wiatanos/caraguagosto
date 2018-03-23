<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Controllers\Controller;
// use App\Http\Requests\categoriaValidator;
use App\Models\Votacao;
use App\Models\Restaurante;


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
            $votacao = new Votacao;
            $votacao->fill($request->all());
            $votacao->save();

            return redirect('votacao')->with('status', 'Ae ae!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function listar(Request $request){
        $resultado = Votacao::where('restaurante_codigo', $request->get('id'))->paginate(1);

        if($resultado->count() == 0){
            return '<div class="alert alert-warning">Nenhum voto contabilizado para tal restaurante</div>';
        };

        $head = '<tr><td>Apresentação do Prato</td><td>Sabor do Prato</td><td>Ambiente</td></tr>';

        foreach ($resultado as $key => $value) {
            $content[] = '<tr>
            <td>'.$value->prato.'</td>
            <td>'.$value->sabor.'</td>
            <td>'.$value->ambiente.'</td>
            <tr>';
        }

        $comma_separated = implode("", $content);


        return $data['table'] = '<table class="table">'.$head.$comma_separated.'</table><nav aria-label="Page navigation example">'.$resultado->links().'</nav>';
    }

    public function relatorio(){

        foreach (Restaurante::all() as $key => $value) {
            $data['codigo'][$value->codigo] = $value->nome;
        }

        // return $data['codigo']
        return view('relatorio', compact('data'));
    }
}