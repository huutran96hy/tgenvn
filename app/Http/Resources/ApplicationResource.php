<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'application_id' => $this->application_id,
            'status' => $this->status,
            'application_date' => $this->application_date,
            'candidate' => new CandidateResource($this->whenLoaded('candidate')),
            'job' => new JobResource($this->whenLoaded('job')),
        ];
    }
}
