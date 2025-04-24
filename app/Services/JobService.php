<?php

namespace App\Services;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Employer;
use App\Models\Skill;
use App\Models\Province;
use App\Models\CompanyPosition;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobService
{
    public function searchJobs(Request $request)
    {
        $query = Job::with('category');

        if ($request->filled('search')) {
            $query->where('job_title', 'like', "%{$request->search}%");
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('employer_id')) {
            $query->where('employer_id', $request->employer_id);
        }

        if ($request->filled('approval_status')) {
            $query->where('approval_status', $request->approval_status);
        }

        return $query->paginate(10);
    }

    public function getFormData(): array
    {
        return [
            'categories' => JobCategory::select('category_id', 'category_name')->get(),
            'employers' => Employer::select('employer_id', 'company_name')->get(),
            'allSkills' => Skill::all(),
            'provinces' => Province::all(),
            'positions' => CompanyPosition::all(),
        ];
    }

    public function getCategories()
    {
        return JobCategory::all();
    }

    public function getEmployers()
    {
        return Employer::all();
    }

    public function createJob(array $data, ?array $skills = [])
    {
        $this->convertDateFields($data);
        $job = Job::create($data);

        if (!empty($skills)) {
            $job->skills()->sync($skills);
        }

        return $job;
    }

    public function updateJob(Job $job, array $data, ?array $skills = [])
    {
        $this->convertDateFields($data);
        $job->update($data);

        if (!empty($skills)) {
            $job->skills()->sync($skills);
        }

        return $job;
    }

    public function bulkUpdateStatus(array $ids, string $status, bool $selectAll = false)
    {
        $query = Job::query();

        if (!$selectAll) {
            $query->whereIn('job_id', $ids);
        }

        return $query->update(['approval_status' => $status]);
    }

    public function bulkDelete(array $ids, bool $selectAll = false)
    {
        $query = Job::query();

        if (!$selectAll) {
            $query->whereIn('job_id', $ids);
        }

        return $query->delete();
    }

    private function convertDateFields(array &$data)
    {
        foreach (['posted_date', 'expiry_date'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = Carbon::createFromFormat('d-m-Y', $data[$field])->format('Y-m-d');
            }
        }
    }
}
