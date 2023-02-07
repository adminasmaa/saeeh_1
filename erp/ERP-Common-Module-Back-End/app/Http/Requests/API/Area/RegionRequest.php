<?php

namespace App\Http\Requests\API\Area;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class RegionRequest extends FormRequest
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

            $code = ['required','alpha_dash', Rule::unique('c_regions','code')->ignore($this->region->id)];
        } else {
            $code = ['required','alpha_dash', Rule::unique('c_regions')];
        }
        return [
            "code" => $code,
            "name_en" => "required|string",
            "name_ar" => "required|string",
            "is_active" => "nullable|boolean",
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
