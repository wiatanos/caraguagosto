<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class restauranteValidator extends FormRequest
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
            'nome' => 'required',
            'codigo' => [
                'required',
                Rule::unique('restaurantes')->ignore($this->request->get('codigo_old'), 'codigo'),
                // Rule::unique('users')->ignore($this->user->id, 'id')
            ],
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
