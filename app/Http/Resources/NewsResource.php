<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'news_id' => $this->news_id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'published_date' => $this->published_date,
            'updated_date' => $this->updated_date,
            'category' => new NewsCategoryResource($this->whenLoaded('category')),
            'author' => $this->whenLoaded('author', function () {
                return [
                    'author_id' => $this->author->id,
                    'name' => $this->author->name,
                ];
            }),
        ];
    }
}
