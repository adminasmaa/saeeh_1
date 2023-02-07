<?php

namespace App\Http\Requests\Localization;

use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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

        if ($this->isMethod('patch')) {
            $code = 'required|unique:c_districts,code,' . $this->district->id;
        } else {
            $code = ['required', Rule::unique('c_districts')];
        }
        return   ["name_ar" => 'nullable|string', "name_en" => 'nullable|string', "is_active" => 'nullable', 'code' => $code,];
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
