<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertismentResource extends JsonResource
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
            'category'=>optional($this->category)->name,
            'name'=>$this->name,
            'location'=>$this->location,
            'price'=>$this->price,
            'age'=>$this->age,
            'type'=>$this->type,
            'image'=>$this->images != null ? asset('uploads/advertisments/'.$this->images[0]) : asset('default.png'),
        ];
    }
}
