<?php

namespace App\Http\Resources\Cliente;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'ciudad' => $this->ciudad,
			'local' => $this->local,
			'nro_factura' => $this->nro_factura,
			'producto' => $this->producto,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
