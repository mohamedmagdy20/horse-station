<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductFavouriteResource extends JsonResource
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
            'product_id'=>$this->product_id,
            'category'=>optional($this->product->category)->name,
            'name'=>$this->product->name,
            'price'=>$this->product->price,
            'image'=>$this->product->images != null ? asset('uploads/products/'.$this->advertisment->images[0]) : asset('default.png'),
        ];
    }
}
