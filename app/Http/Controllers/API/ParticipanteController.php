<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Participante\CreateParticipanteRequest;
use App\Http\Requests\Participante\UpdateParticipanteRequest;
use App\Http\Resources\Participante\ParticipanteResource;
use App\Models\Participante;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection 
    {
        $participantes = Participante::useFilters()->dynamicPaginate();

        return ParticipanteResource::collection($participantes);
    }

    public function store(CreateParticipanteRequest $request): JsonResponse
    {
        $participante = Participante::create($request->validated());

        return $this->responseCreated('Participante created successfully', new ParticipanteResource($participante));
    }

    public function show(Participante $participante): JsonResponse
    {
        return $this->responseSuccess(null, new ParticipanteResource($participante));
    }

    public function update(UpdateParticipanteRequest $request, Participante $participante): JsonResponse
    {
        $participante->update($request->validated());

        return $this->responseSuccess('Participante updated Successfully', new ParticipanteResource($participante));
    }

    public function destroy(Participante $participante): JsonResponse
    {
        $participante->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $participante = Participante::onlyTrashed()->findOrFail($id);

        $participante->restore();

        return $this->responseSuccess('Participante restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $participante = Participante::withTrashed()->findOrFail($id);

        $participante->forceDelete();

        return $this->responseDeleted();
    }

}
