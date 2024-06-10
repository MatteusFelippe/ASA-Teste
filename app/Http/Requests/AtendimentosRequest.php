<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtendimentosRequest extends FormRequest
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
            'data_atendimento' => ['required','date','max:10'],
            'medico_id' => ['required'],
            'paciente_id' => ['required'],
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
            'data_atendimento' => [
                'required' => 'A data do atendimento é obrigatória',
                'max' => 'O tamanho máximo da data do atendimento é 10 caracteres',
                'date' => 'Deve conter uma data válida',
            ],

            'medico_id' => [
                'required' => 'O id do médico é obrigatório',
            ],
            
            'paciente_id' => [
                'required' => 'O id do paciente é obrigatório',
            ],
        ];
    }
}
