<?php

namespace App\Http\Resources\documentIssuer;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentIssuerResource extends JsonResource
{

    public static $wrap = 'data';
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $name = 'name_' . app()->getLocale();
        return [

            'id' => $this->id,
            'name_ar' => $this->name_ar ?? '',
            'name_en' => $this->name_en ?? '',
            'code' => $this->code,
            'name' => $this->$name,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
