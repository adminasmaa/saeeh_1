<?php

namespace App\Http\Resources\Vehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $plate_number = 'plate_number_' . app()->getLocale();

        return [
            'id'  => $this->id,
            "code" => $this->code ?? '',
            "vtype" => $this->vtype ?? '',
            "plate_number_en" => $this->plate_number_en ?? '',
            "plate_number_ar" => $this->plate_number_ar ?? '',
            "plate_number" => $this->$plate_number,
            "model" => $this->model ?? '',
            "vehicle_kind" => $this->vehicle_kind ?? '',
            "base_size" => $this->base_size ?? '',
            "secret_no" => $this->secret_no ?? '',
            "prod_country" => $this->prod_country ?? '',
            "prod_date" => $this->prod_date ?? '',
            "chassis_no" => $this->chassis_no ?? '',
            "color" => $this->color ?? '',
            "tank_cap1" => $this->tank_cap1 ?? '',
            "tank_cap2" => $this->tank_cap2 ?? '',
            "weight" => $this->weight ?? '',
            "max_mnt_order" => $this->max_mnt_order ?? '',
            "allowed_ex_liter" => $this->allowed_ex_liter ?? '',
            "purchase_date" => $this->purchase_date ?? '',
            "purchase_price" => $this->purchase_price ?? '',
            "current_value" => $this->current_value ?? '',
            "renew_date" => $this->renew_date ?? '',
            "vclass" => $this->vclass ?? '',
            "fuel_ratio" => $this->fuel_ratio ?? '',
            "oil_ratio" => $this->oil_ratio ?? '',
            "base_type" => $this->base_type ?? '',
            "trans_license" => $this->trans_license ?? '',
            "GPS_device" => $this->GPS_device ?? '',
            "ext_code" => $this->ext_code ?? '',
            "notes" => $this->notes ?? '',
            "cost_center_id" => $this->cost_center_id ?? '',
            "vehicle_type_id" => $this->vehicle_type_id ?? '',
            "account_id" => $this->account_id ?? '',
            'is_active'                  => $this->is_active,
            'cards' => CardResource::collection($this->vehicleDocument),
            'created_at' => $this->created_at->format('d/m/Y')


        ];
    }
}
