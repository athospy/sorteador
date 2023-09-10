<?php

namespace App\Http\Requests\Participante;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParticipanteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cedula' => ['sometimes', 'string'],
			'nombre' => ['sometimes', 'string'],
			'ciudad' => ['sometimes', 'string'],
			'cupones' => ['sometimes', 'integer'],
        ];
    }
}
