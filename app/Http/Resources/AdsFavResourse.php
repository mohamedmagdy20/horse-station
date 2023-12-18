<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdsFavResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->advertisment_id,
            'category'=>optional($this->advertisment->category)->name,
            'name'=>$this->advertisment->name,
            'location'=>$this->advertisment->country->name,
            'price'=>$this->advertisment->price,
            'age'=>$this->advertisment->age,
            'image'=>$this->advertisment->images != null ? asset('uploads/advertisments/'.$this->advertisment->images[0]) : asset('default.png'),
        ];
    }
}
