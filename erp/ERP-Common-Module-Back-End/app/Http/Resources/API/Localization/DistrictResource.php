<?php

namespace App\Http\Resources\API\Localization;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
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
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,

            "code" => $this->code,
            'name' => $this->$name,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
