<?php

namespace App\Http\Resources\Currency;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyPartResource extends JsonResource
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
            'rate' => $this->rate ?? '',
            'is_active' => $this->is_active ?? '',
            'currency_id' =>$this->currency_id ?? '',
            //'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
