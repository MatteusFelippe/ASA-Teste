<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicosRequest extends FormRequest
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
            'crm' => ['required','string','regex:/^\d{1,6}-[A-Z]{2}$/','unique:medicos'],
            'especialidade' => ['nullable','string','regex:/^[a-zA-Z\s]+$/','max:255'],
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
                'regex' => 'O campo nome deve conter apenas letras.',
                'string' => 'Deve conter texto',
                'max' => 'O tamanho máximo do nome é 255 caracteres',
            ],

            'crm' => [
                'required' => 'O CRM é obrigatório',
                'regex' => 'O CRM deve ter o formato correto, como 123456-SP.',
                'unique' => 'Este CRM já está registrado',
            ],
            
            'especialidade' => [
                'regex' => 'O campo especialidade deve conter apenas letras.',
                'string' => 'Deve conter texto',
                'max' => 'O tamanho máximo da especialidade é 255 caracteres',
            ],
        ];
    }
}
