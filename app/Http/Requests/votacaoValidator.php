<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class votacaoValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         // $id = $this->request->get('codigo');

        return [
            'nome'                  => 'required',
            'email'                 => 'required|email',
            'cpf'                   => 'required|cpf',
            'restaurante_codigo'    => 'required',
            'prato_id'              => 'required',
            'apresentacao'          => 'required',
            'sabor'                 => 'required',
            'ambiente'              => 'required'
        ];
    }

    

    public function messages()
    {
        return [
            'required' => 'O Campo :attribute é necessario',
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
