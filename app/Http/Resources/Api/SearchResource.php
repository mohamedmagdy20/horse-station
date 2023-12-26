<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'category'=>$this->category->name,
            'price'=>$this->price,
            'image'=>$this->type == 'camp' ? asset('uploads/camps/'.$this->images[0]) :  asset('uploads/products/'.$this->images[0])
        ];
    }
}
