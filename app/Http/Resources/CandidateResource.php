<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'candidate_id' => $this->candidate_id,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'resume' => $this->resume,
            'education' => $this->education,
            // 'user' => new UserResource($this->whenLoaded('user')),
            // 'applications' => ApplicationResource::collection($this->whenLoaded('applications')),
        ];
    }
}
