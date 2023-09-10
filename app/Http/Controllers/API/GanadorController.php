<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ganador\CreateGanadorRequest;
use App\Http\Requests\Ganador\UpdateGanadorRequest;
use App\Http\Resources\Ganador\GanadorResource;
use App\Models\Ganador;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GanadorController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection 
    {
        $ganadors = Ganador::useFilters()->dynamicPaginate();

        return GanadorResource::collection($ganadors);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cliente_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'errors' => $validator->errors(),
            ]);
        }
        $ganador = Ganador::create($validator->validated());
        return Redirect::back()->with([
            'data' => 'Cargado con exito',
        ]);

    }

    public function show(Ganador $ganador): JsonResponse
    {
        return $this->responseSuccess(null, new GanadorResource($ganador));
    }

    public function update(UpdateGanadorRequest $request, Ganador $ganador): JsonResponse
    {
        $ganador->update($request->validated());

        return $this->responseSuccess('Ganador updated Successfully', new GanadorResource($ganador));
    }

    public function destroy(Ganador $ganador): JsonResponse
    {
        $ganador->delete();

        return $this->responseDeleted();
    }

    public function resetearGanadores(){
        DB::table('ganadores')->truncate();
        return Redirect::back()->with([
            'data' => 'Cargado con exito',
        ]);
    }

}
