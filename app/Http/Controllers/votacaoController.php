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
use App\Http\Requests\votacaoValidator;
use App\Models\Votacao;
use App\Models\Restaurante;
use App\Models\Pessoa;




/**
* 
*/
class votacaoController extends BaseController
{
	
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        foreach (Restaurante::all() as $key => $value) {
            $data['codigo'][$value->codigo] = $value->nome;
        }

        return view('votacao', compact('data'));
    }

    public function insert(votacaoValidator $request){
        try{
            $pessoa = Pessoa::where('cpf', $request->get('cpf'));
            if ($pessoa->count() == 0) {
                $pessoa = new Pessoa;
                $pessoa->fill($request->all());
                $pessoa->save();
                $id = $pessoa->id;
            }else{
                $id = $pessoa->first()->id;
            }

            if(Votacao::where('pessoa_id', $id)->count() !== 0){
                if (Votacao::where('pessoa_id', $id)->first()->restaurante_codigo == $request->get('restaurante_codigo')) {
                    return redirect('votacao')->with('status', 'Você já votou nesse restaurente');
                }
            }

            foreach ($request->get('prato_id') as $key => $value) {
                $votacao = new Votacao;
                $votacao->fill($request->except('prato_id'));
                $votacao->prato_id = $value;
                $votacao->apresentacao = $request->get('apresentacao')[$key];
                $votacao->sabor = $request->get('sabor')[$key];
                $votacao->pessoa_id = $id;
                $votacao->save();

            }

            return redirect('votacao')->with('status', 'Ae ae!');
        }catch (Exception $e){
            return $e;
        }
    }

    public function listar(Request $request){
        $resultado = Votacao::where('restaurante_codigo', $request->get('id'))->paginate(10);

        if($resultado->count() == 0){
            return '<div class="alert alert-warning">Nenhum voto contabilizado para tal restaurante</div>';
        };

        $head = '<thead class="thead-dark"><tr><td>Prato</td><td>Apresentação</td><td>Sabor do Prato</td><td>Ambiente</td></tr><thead>';

        foreach ($resultado as $key => $value) {
            $content[] = '<tbody><tr>
            <td>'.$value->prato->nome.'</td>
            <td>'.$value->apresentacao.'</td>
            <td>'.$value->sabor.'</td>
            <td>'.$value->ambiente.'</td>
            <tr></tbody>';
        }
        $comma_separated = implode("", $content);


        return $data['table'] = '<table class="table table-hover">'.$head.$comma_separated.'</table><nav aria-label="Page navigation example">'.$resultado->links().'</nav>';
    }

    public function relatorio(){

        foreach (Restaurante::all() as $key => $value) {
            $data['codigo'][$value->codigo] = $value->nome;
        }

        return view('relatorio', compact('data'));
    }

    public function prato($id){

        foreach (Restaurante::where('codigo', $id)->first()->pratos as $key => $value) {
            $pratos[$value->id] = $value->nome;
        }

        return $pratos;
    }
}