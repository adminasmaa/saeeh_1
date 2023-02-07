<?php

namespace App\Http\Requests\CarStatus;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use function request;

class CarStatusRequest extends FormRequest
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

            $code = 'required|unique:c_car_status,code,' . $this->car_status->id;
        }
        else {
            $code = ['required', Rule::unique('c_car_status')];
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
