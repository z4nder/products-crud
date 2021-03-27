<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (integer) $this->id,
            'name' => (string) $this->name,
            'price' => (float) $this->price,
            'formate_price' => (string) "R$ ".$this->price,
            'weight' => (float) $this->weight,
            'formate_weight' => (string) $this->weight." KG",
            'is_available' => (boolean) $this->is_available,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
        ];
    }
}
