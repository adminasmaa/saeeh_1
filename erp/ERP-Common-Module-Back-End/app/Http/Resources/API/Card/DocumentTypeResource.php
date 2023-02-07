<?php

namespace App\Http\Resources\API\Card;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentTypeResource extends JsonResource
{
//    public static $wrap = 'data';

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

            'code' => $this->code,
            'dtype' => $this->dtype,
            'follow_renewal' => $this->follow_renewal,
            'days_count' => $this->days_count ?? '',
            'is_active' => $this->is_active ?? '',
            'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
