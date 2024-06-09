<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required','string','alpha','max:255'],
            'cpf' => ['required','integer','max:11','unique:pacientes'],
            'data_nascimento' => ['nullable','date','max:10'],
            'email' => ['required','email','max:255','unique:pacientes'],   
            //algumas pessoas não possuem email, mas como não tem outra forma de contato, coloquei como obrigatório 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'nome' => [
                'required' => 'O nome é obrigatório',
                'alpha' => 'O campo nome deve conter apenas letras.',
                'max' => 'O tamanho máximo do nome é 255 caracteres',
            ],

            'cpf' => [
                'required' => 'O cpf é obrigatório',
                'max' => 'O tamanho máximo do cpf é 11 caracteres',
                'integer' => 'Deve conter somente números',
                'unique' => 'Este cpf já está registrado',
            ],
            
            'data_nascimento' => [
                'max' => 'O tamanho máximo do da data de nascimento é 10 caracteres',
                'date' => 'Deve conter uma data válida',
            ],
            
            'email' => [
                'required' => 'O email é obrigatório',
                'email' => 'Deve estar em um formato válido',
                'unique' => 'Este e-mail já está registrado',
                'max' => 'O tamanho máximo do email é 255 caracteres',
            ],
        ];
    }
}
