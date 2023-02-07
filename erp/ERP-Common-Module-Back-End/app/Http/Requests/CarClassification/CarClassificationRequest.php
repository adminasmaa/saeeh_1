<?php

namespace App\Http\Requests\CarClassification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use function request;


class CarClassificationRequest extends FormRequest
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
        $code = ['required', Rule::unique('c_vehicle_classifications','code')->ignore($this->car_classification->id)];
           
        } else {
            $code = ['required', Rule::unique('c_vehicle_classifications')->where(function ($query) {
                $query->where('deleted_at',null);
            })];
          
        }
        $rules = [
            'code' => $code,
            'name_en'   => 'string|nullable',
            'name_ar'   => 'string|required_if:name_en,null',
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
