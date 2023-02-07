<?php

namespace App\Http\Resources\payment;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $name = 'name_' . app()->getLocale();
       return [
           'id' => $this->id,
           'name' => $this->$name,
           'name_ar' => $this->name_ar ?? '',
           'name_en' => $this->name_en ?? '',
           'code' => $this->code ?? '',
           'fees_type' => $this->fees_type ?? '',
           'fees_value' => $this->fees_value ?? '',
           'max_fees_value' => $this->max_fees_value ?? '',
           'tax_percent' => $this->tax_percent ?? '',
           'temp_account_id' => $this->temp_account_id	 ?? '',
           'fees_account_id' => $this->fees_account_id	 ?? '',
           'tax_account_id' => $this->tax_account_id	 ?? '',
           'is_active' => $this->is_active ?? '',
           'created_at' => $this->created_at->format('d/m/Y')
       ];
   }
}
