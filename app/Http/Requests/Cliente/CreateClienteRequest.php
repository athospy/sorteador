<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateClienteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cedula' => ['required', 'string'],
			'nombre' => ['required', 'string'],
			'ciudad' => ['required', 'string'],
			'local' => ['required', 'string'],
			'nro_factura' => ['required', 'string'],
			'producto' => ['required', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first(),
            'errors' => $validator->errors(),
        ], 422));

        return responseUnprocessable($errorDetails,$errorTitle);
       

    }



    public function messages(){

        return [

            'title.required' => 'Title is required',

            'body.required' => 'Body is required'

        ];

    }

}
