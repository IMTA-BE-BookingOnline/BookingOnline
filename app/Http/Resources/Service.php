<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'categories_id'=>$this->categories_id,
            'name'=>$this->name,
            'describe'=>$this->describe,
            'price'=>$this->price,
            'created_at'=>$this->created_at->format('d/M/Y'),
        ];



    }
}
