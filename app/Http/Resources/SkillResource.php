<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'skill_id' => $this->skill_id,
            'skill_name' => $this->skill_name,
            'jobs' => $this->whenLoaded('jobs', function () {
                return $this->jobs->map(fn($job) => [
                    'job_id' => $job->job_id,
                    'job_title' => $job->job_title,
                ]);
            }),
        ];
    }
}
