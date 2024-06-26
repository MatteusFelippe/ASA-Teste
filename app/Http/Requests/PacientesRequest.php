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
            'nome' => ['required','string','regex:/^[a-zA-Z\s]+$/','max:255'],
            'cpf' => ['required','string','max:11','unique:pacientes','regex:/^\d{11}$/'],
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
            'nome.required' => 'O nome é obrigatório',
            'nome.regex' => 'O campo nome deve conter apenas letras.',
            'nome.max' => 'O tamanho máximo do nome é 255 caracteres',
        
            'cpf.required' => 'O cpf é obrigatório',
            'cpf.max' => 'O tamanho máximo do cpf é 11 caracteres',
            'cpf.unique' => 'Este cpf já está registrado',
            'cpf.regex' => 'O CPF deve ter o formato correto',
        
            'data_nascimento.max' => 'O tamanho máximo da data de nascimento é 10 caracteres',
            'data_nascimento.date' => 'Deve conter uma data válida',
        
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Deve estar em um formato válido',
            'email.unique' => 'Este e-mail já está registrado',
            'email.max' => 'O tamanho máximo do email é 255 caracteres',
        ];
    }
}
