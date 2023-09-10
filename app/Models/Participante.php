<?php

namespace App\Models;

use App\Filters\ParticipanteFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = ParticipanteFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cedula',
		'nombre',
		'ciudad',
		'cupones',
    ];


}
