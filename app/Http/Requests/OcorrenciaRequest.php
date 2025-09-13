<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcorrenciaRequest extends FormRequest
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
            'descricao' => 'string|required|min:10|max:255',
            'estudante_id' => 'required|exists:estudantes,id',
            'medida_id' => 'required|exists:medidas,id',
        ];
    }
}
