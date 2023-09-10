<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cedula' => ['sometimes', 'string'],
			'nombre' => ['sometimes', 'string'],
			'ciudad' => ['sometimes', 'string'],
			'local' => ['sometimes', 'string'],
			'nro_factura' => ['sometimes', 'string'],
			'producto' => ['sometimes', 'string'],
        ];
    }
}
