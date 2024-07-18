<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, 
            'user' => $this->user->name,
            'product' => new ProductResource($this->product), 
            'type' => $this->type, 
            'search_for' => $this->search_query, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
        ];
    }
}
