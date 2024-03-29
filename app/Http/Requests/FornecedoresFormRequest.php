<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedoresFormRequest extends FormRequest
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
            'nome'=> ['required ', 'min:3']
            
        ];
    }
    public function messages(){
        return ['nome.required' => 'campo nome Obrigatório!' , 'nome.min' => 'Minimo de caracteres 3 !'];
    }
}