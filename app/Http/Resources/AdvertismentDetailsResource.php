<?php

namespace App\Http\Resources;

use App\Models\AdsFavourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertismentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $favouriteId = AdsFavourite::where('user_id',auth()->user()->id)->where('advertisment_id',$this->id)->first();

        $images = $this->images;
        $dataImages = []; 
        if($images != null)
        {
            foreach($images as $image)
            {
                $dataImages [] = asset('uploads/advertisments/'.$image);
            }    
        }

        $videos = $this->videos;
        $dataVideos = []; 
        if($videos != null)
        {
            foreach($videos as $item)
            {
                $dataVideos [] = asset('uploads/videos/'.$item);
            }    
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>optional($this->category)->name,
            'images'=>$dataImages,
            'videos'=>$dataVideos,
            'price'=>$this->price,
            'age'=>$this->age,
            'location'=>$this->country->name,
            'description'=>$this->description,
            'favourite_id'=>$favouriteId == null ? null : $favouriteId,
            'type'=>'advertisment'
        ];
    }
}
