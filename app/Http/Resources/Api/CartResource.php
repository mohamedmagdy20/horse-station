<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'name'=>$this->product->name,
            'size'=>$this->product->size,
            'colors'=>$this->product->colors,
            'price'=> $this->product->price,
            'deliver_time'=>$this->product->deliver_time,
            'image'=> $this->product->images != null ?  asset('uploads/products/'.$this->product->images[0]) : asset('default.png'),
            'stock'=>$this->qantity,
            'total'=>number_format((float)$this->product->price * $this->qantity, 2),
        ];
    }
}
