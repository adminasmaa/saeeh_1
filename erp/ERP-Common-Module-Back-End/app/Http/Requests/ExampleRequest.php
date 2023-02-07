<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "description" => "required|min:3|max:1000",
            //            "exampleString" => "nullable|string",
//            "exampleString" => "required|string",
//            "exampleString" => "required|string|min:3|max:1000",
//            "examplePhone" => "required|phone|min:10|max:15",
//            "exampleBoolean" => "required|boolean",
//            "exampleArray" => "required|array",
//            "exampleArray.*" => "string",
//            'startDate' => 'required|date|date_format:Y-m-d|after:tomorrow',
//            'finishDate' => 'required|date|date_format:Y-m-d|after:start_date',
//            'exampleId' => 'required|exists:table_name,id',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse([
            'message' => 'The given data is invalid',
            'errors' => $validator->errors(),
            'status' => 422
        ]);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
