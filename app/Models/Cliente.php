<?php

namespace App\Models;

use App\Filters\ClienteFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = ClienteFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cedula',
		'nombre',
		'ciudad',
		'local',
		'nro_factura',
		'producto',
    ];


}
