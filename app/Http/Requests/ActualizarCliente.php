<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarCliente extends FormRequest
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
            'nombre'=>'sometimes|string|max:100',
            'apellido'=>'sometimes|string|max:100',
            'tipoDocumentoId'=>'sometimes|integer',
            'numeroDocumento' => 'sometimes|string|max:20',
            'telefono'=>'sometimes|integer',
            'direccion'=>'sometimes|string|max:255',
        ];
    }
}
