<?php

namespace App\Http\Requests\API\Card;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentTypeRequest extends FormRequest
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
    public function rules(Request $request)
    {

        Log::debug($request->all());
        if (request()->method() == 'PATCH') {

            $code = ['required', Rule::unique('c_document_types','code')->ignore($this->document_type->id)];


        } else {
            $code = ['required', Rule::unique('c_document_types')->where(function ($query) {
                $query->where('dtype', request()->dtype);
                $query->where('deleted_at',null);
            })];

        };
        $rules =[

            "code" => $code,
            "dtype" => "nullable",
            "follow_renewal" => "nullable",
            "days_count" => "nullable",
            "is_active" => "nullable",
            "name_ar" => "nullable",
            "name_en" => "nullable",
        ];

        return $rules;
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
