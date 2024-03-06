<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=> ['required ', 'min:3'],
            'id_marca'=> ['required','numeric'],
            'id_fornecedor' => ['required','numeric']
        ];
    }
    public function messages(){
        return ['nome.required' => 'campo nome Obrigatório!' , 'nome.min' => 'Minimo de caracteres 3 !',
                'id_marca.required' => 'Campo Marca Obrigatório', 'id_marca.numeric' => 'id de marca não numerico',
                'id_fornecedor.required' => 'Campo Fornecedor Obrigatório', 'id_fornecedor.numeric' => 'id de fornecedor não numerico' ];
    }
}