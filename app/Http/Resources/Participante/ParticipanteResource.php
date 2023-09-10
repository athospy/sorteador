<?php

namespace App\Http\Resources\Participante;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipanteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'ciudad' => $this->ciudad,
			'cupones' => $this->cupones,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
