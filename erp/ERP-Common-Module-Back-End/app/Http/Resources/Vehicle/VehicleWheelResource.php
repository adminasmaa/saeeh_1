<?php

namespace App\Http\Resources\Vehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleWheelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product_name = 'product_name_' . app()->getLocale();
        $warehouse_name = 'warehouse_name_' . app()->getLocale();
        return [

            'serial_no' => $this->serial_no,
            'size' => $this->size,
            'description' => $this->description,
            'type' => $this->type,
            'wheel_date' => $this->wheel_date,
            'state' => $this->state,
            'prod_date' => $this->prod_date,
            'notes' => $this->notes,
            'guaranty_qty' => $this->guaranty_qty,
            'vehicle_id' => $this->vehicle_id,
            'wheel_id' => $this->wheel_id,
            'wheel_name_en' => $this->wheel_name_en ? $this->wheel_name_en : '',
            'wheel_name_ar' => $this->wheel_name_ar ? $this->wheel_name_ar : '',
            'product_id' => $this->product_id,
            'warehouse_id' => $this->warehouse_id,
            'product_name_en'=>$this->product_name_en,
            'wareHouse_name_en'=>$this->warehouse_name_en,
            'product_name_ar'=>$this->product_name_ar,
            'wareHouse_name_ar'=>$this->warehouse_name_ar,

            'product_name'=>$this->$product_name,
            'wareHouse_name'=>$this->$warehouse_name,
            'is_active'                  => $this->is_active,
            


        ];
    }
}
