<?php

namespace App\Http\Resources\Currency;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
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
        $part_name = 'part_name_' . app()->getLocale();
        return [
            'id' => $this->id,
            'code'=>$this->code,
            'name' => $this->$name,
            'name_ar' => $this->name_ar ?? '',
            'name_en' => $this->name_en ?? '',
            'symbol' => $this->symbol ?? '',
            'part_name_ar' => $this->part_name_ar ?? '',
            'part_name_en' => $this->part_name_en ?? '',
            'part_name' => $this->$part_name,
            'is_active' => $this->is_active ?? '',
            'exchanges'  => CurrencyExchangeResource::collection($this->currencyExchange),
            'parts'  => CurrencyPartResource::collection($this->currencyPart),
            //'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
