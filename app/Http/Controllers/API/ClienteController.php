<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\CreateClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Http\Resources\Cliente\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $clientes = Cliente::useFilters()->dynamicPaginate();

        return ClienteResource::collection($clientes);
    }


    /*
    public function store(CreateClienteRequest $request): JsonResponse
    {
        $cliente = Cliente::create($request->validated());

        return $this->responseCreated('Cliente created successfully', new ClienteResource($cliente));
    }
    */



    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'cedula' => ['required', 'string'],
            'nombre' => ['required', 'string'],
            'ciudad' => ['required', 'string'],
            'local' => ['required', 'string'],
            'nro_factura' => ['required', 'string'],
            'producto' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            //return $this->responseUnprocessable($validator->errors(), "Favor completar todos los campos");
            return Redirect::back()->with([
                'errors' => $validator->errors(),
            ]);
        }
        $cliente = Cliente::create($validator->validated());
        new ClienteResource($cliente);
        //return $this->responseCreated('Cliente created successfully', new ClienteResource($cliente));
        return Redirect::back()->with([
            'data' => 'Cargado con exito',
        ]);
    }



    public function show(Cliente $cliente): JsonResponse
    {
        return $this->responseSuccess(null, new ClienteResource($cliente));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente): JsonResponse
    {
        $cliente->update($request->validated());

        return $this->responseSuccess('Cliente updated Successfully', new ClienteResource($cliente));
    }

    public function destroy(Cliente $cliente): JsonResponse
    {
        $cliente->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $cliente = Cliente::onlyTrashed()->findOrFail($id);

        $cliente->restore();

        return $this->responseSuccess('Cliente restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $cliente = Cliente::withTrashed()->findOrFail($id);

        $cliente->forceDelete();

        return $this->responseDeleted();
    }
}
