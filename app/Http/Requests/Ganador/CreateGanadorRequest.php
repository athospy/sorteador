<?php

namespace App\Http\Requests\Ganador;

use Illuminate\Foundation\Http\FormRequest;

class CreateGanadorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'integer'],
			'fecha' => ['required', 'date'],
        ];
    }
}
