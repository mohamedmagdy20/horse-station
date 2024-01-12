<?php

namespace App\Http\Resources;

use App\Models\AdsFavourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AdvertismentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($bearerToken = $request->bearerToken()) {
            // This will attempt to authenticate using the token but won't fail if the token is invalid
            $user = Auth::guard('sanctum')->setRequest($request)->user();
        } else {
            $user = null;
        }

        if ($user) {
            $favouriteId = AdsFavourite::where('user_id', $user->id)->where('advertisment_id', $this->id)->first();
            $favouriteId = $favouriteId ? $favouriteId->id : null;

            // Get the Instagram link from the user table
            $instagramLink = $user->link;
        } else {
            $favouriteId = null;
            $instagramLink = null;
        }

        $images = $this->images;
        $videos = $this->videos;
        $dataImages = null;

        if (!empty($this->images)) {
            $dataImages = is_array($this->images)
                ? array_map(fn($image) => asset('uploads/advertisments/' . $image), $this->images)
                : [asset('uploads/advertisments/' . $this->images)];
        }

        $dataVideos = is_array($this->videos)
            ? implode(',', array_map(fn($video) => asset('uploads/advertisments/' . $video), $this->videos))
            : $this->videos;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => optional($this->category)->name,
            'images' => $dataImages,
            'videos' => $dataVideos,
            'price' => $this->price,
            'age' => $this->age,
            'location' => $this->country->name,
            'description' => $this->description,
            'favourite_id' => $favouriteId,
            'type' => 'advertisment',
            'phone' => $this->phone,
            'category_id' => $this->category_id,
            'country_id' => $this->country_id,
            'ads_type' => $this->ads_type,
            'instagram_link' => $instagramLink, // Include the Instagram link in the response
        ];
    }

}
