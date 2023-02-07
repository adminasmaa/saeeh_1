<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Vehicle\VehicleType;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class VehicleDataRequest extends FormRequest
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

            $code = ['required', Rule::unique('c_vehicle_data','code')->ignore($this->vehicle_data->id)];

        } else {
            $code = ['required', Rule::unique('c_vehicle_data')->where(function ($query) {
                $query->where('vtype', request()->vtype);
                $query->where('deleted_at',null);
            })];
        }

        $rules = [

            "code" => $code,
            'plate_number_en'   => 'string|nullable',
            'plate_number_ar'   => 'string|required_if:plate_number_en,null',
            "model"=>"nullable",
            "vehicle_kind"=>"nullable",
            "base_size"=>"nullable",
            "secret_no"=>"nullable",
            "prod_country"=>"nullable",
            "prod_date"=>"nullable",
            "chassis_no"=>"nullable",
            "color"=>"nullable",
            "tank_cap1"=>"nullable",
            "tank_cap2"=>"nullable",
            "weight"=>"nullable",
            "max_mnt_order"=>"nullable",
            "allowed_ex_liter"=>"nullable",
            "purchase_date"=>"nullable",
            "purchase_price"=>"nullable",
            "current_value"=>"nullable",
            "renew_date"=>"nullable",
            "vclass"=>"nullable",
            "fuel_ratio"=>"nullable",
            "oil_ratio"=>"nullable",
            "base_type"=>"nullable",
            "trans_license"=>"nullable",
            "GPS_device"=>"nullable",
            "ext_code"=>"nullable",
            "notes"=>"nullable",
            "is_active"=>"nullable",
            "cards.*"=>"nullable",
            "vehicle_type_id"=>"nullable"

        ];
        return $rules ;
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
