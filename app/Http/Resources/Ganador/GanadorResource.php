<?php

namespace App\Http\Resources\Ganador;

use Illuminate\Http\Resources\Json\JsonResource;

class GanadorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
			'fecha' => dateTimeFormat($this->fecha),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
