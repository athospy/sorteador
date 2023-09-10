<?php

namespace App\Models;

use App\Filters\GanadorFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ganador extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = GanadorFilters::class;
    protected $table="ganadores";

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id',
    ];


}
