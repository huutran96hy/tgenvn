<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'employer_id' => $this->employer_id,
            'company_name' => $this->company_name,
            'company_description' => $this->company_description,
            'website' => $this->website,
            'contact_phone' => $this->contact_phone,
            'address' => $this->address,
            // 'jobs' => JobResource::collection($this->whenLoaded('jobs')),
            // 'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
