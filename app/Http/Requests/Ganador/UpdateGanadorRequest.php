<?php

namespace App\Http\Requests\Ganador;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGanadorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cliente_id' => ['sometimes', 'integer'],
			'fecha' => ['sometimes', 'date'],
        ];
    }
}
