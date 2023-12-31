<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->type == 'advertisment')
        {
            return [
                'id'=>$this->advertisment->id,
                'item_id'=>  $this->id, 
                'name'=>$this->advertisment->name,
                'category'=>$this->advertisment->category->name,
                'price'=>$this->price,
                'type'=>$this->type,
                'image'=>$this->advertisment->images != null ?  asset('uploads/advertisments/'.$this->advertisment->images[0]) : asset('default.png')
            ];
        }else
        {
            return [
                'id'=>$this->product->id,
                'item_id'=>  $this->id, 
                'name'=>$this->product->name,
                'category'=>$this->product->category->name,
                'price'=>$this->price,
                'type'=>$this->type,
                'image'=>$this->product->images != null ?  asset('uploads/products/'.$this->product->images[0]) : asset('default.png')        
            ];
        }
        
    }
}
