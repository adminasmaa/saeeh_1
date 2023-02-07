<?php

namespace App\Http\Requests\DocumentIssuer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use function request;

class DocumentIssuerRequest extends FormRequest
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


        if (request()->method() == 'PATCH') {


            $code = 'required|unique:c_document_issuer,code,' . $this->document_issuer->id;
        } else {
            $code = ['required', Rule::unique('c_document_issuer')];
        }
        $rules = [
            'code' => $code,
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            "is_active" => "nullable|boolean",

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
