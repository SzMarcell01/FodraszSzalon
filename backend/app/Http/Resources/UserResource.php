<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image_url' => $this->image_url, // Ha van ilyen mező a User modellben
            'description' => $this->description, // Ha van ilyen mező a User modellben
            'services' => ServiceResource::collection($this->whenLoaded('services')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            // További mezők, amiket szeretnél visszaadni
        ];
    }
}
