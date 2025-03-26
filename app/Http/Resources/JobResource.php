<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'job_id' => $this->job_id,
            'job_title' => $this->job_title,
            'job_description' => $this->job_description,
            'requirements' => $this->requirements,
            'salary' => $this->salary,
            'location' => $this->location,
            'posted_date' => $this->posted_date,
            'expiry_date' => $this->expiry_date,
            'employer' => new EmployerResource($this->whenLoaded('employer')),
            // 'applications' => ApplicationResource::collection($this->whenLoaded('applications')),
            // 'category' => new JobCategoryResource($this->whenLoaded('category')),
            // 'skills' => SkillResource::collection($this->whenLoaded('skills')),
        ];
    }
}
