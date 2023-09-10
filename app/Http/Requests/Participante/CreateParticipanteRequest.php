<?php

namespace App\Http\Requests\Participante;

use Illuminate\Foundation\Http\FormRequest;

class CreateParticipanteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cedula' => ['required', 'string'],
			'nombre' => ['required', 'string'],
			'ciudad' => ['required', 'string'],
			'cupones' => ['required', 'integer'],
        ];
    }
}
