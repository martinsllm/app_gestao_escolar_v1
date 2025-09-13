<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudanteRequest extends FormRequest
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
            'matricula' => 'required|unique:estudantes,matricula,' . $this->route('estudante'),
            'nome_completo' => 'required',
            'data_nascimento' => 'required',
            'telefone_responsavel' => 'required',
            'email' => 'required|email',
            'turma_id' => 'required|exists:turmas,id',
        ];
    }
}
