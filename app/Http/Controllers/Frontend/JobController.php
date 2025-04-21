<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Province;
use App\Models\CompanyPosition;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Hiển thị danh sách việc làm với các bộ lọc và sắp xếp.
     */
    public function index(Request $request)
    {
        return $this->getJobList($request, null);
    }

    /**
     * Hiển thị danh sách việc làm tốt nhất.
     */
    public function best(Request $request)
    {
        return $this->getJobList($request, 'yes');
    }

    /**
     * Hiển thị danh sách việc làm gợi ý.
     */
    public function suggested(Request $request)
    {
        return $this->getJobList($request, 'no');
    }

    /**
     * Phương thức chung để lấy danh sách việc làm.
     * 
     * @param Request $request
     * @param string|null $isHot
     * @return \Illuminate\View\View
     */
    private function getJobList(Request $request, $isHot = null)
    {
        $query = Job::with([
            'employer:employer_id,company_name,logo',
            'skills',
            'province:id,name'
        ])
            ->where('approval_status', 'approved')
            ->whereDate('expiry_date', '>=', Carbon::today());

        $categories = JobCategory::all();
        $provinces = Province::all();
        $positions = CompanyPosition::select('id', 'name')->get();

        if (!is_null($isHot)) {
            $query->where('is_hot', $isHot);
        }

        $query = $this->searchJobs($request, $query);

        $perPage = $request->input('per_page', 12);

        // Lấy danh sách job đã lọc và sắp xếp
        $jobs = $query->paginate($perPage)->appends($request->query());

        // Ajax request
        if ($request->ajax()) {
            $jobs->appends($request->query());

            return response()->json([
                'html' => view('Frontend.partials.job_list_items', compact('jobs'))->render(),
                'pagination' => $jobs->links('Frontend.pagination.custom')->toHtml(),
                'data' => [
                    'from' => $jobs->firstItem(),
                    'to' => $jobs->lastItem(),
                    'total' => $jobs->total(),
                ],
            ]);
        }

        return view('Frontend.pages.job_list', compact(
            'jobs',
            'categories',
            'provinces',
            'positions'
        ));
    }

    /**
     * Lọc và sắp xếp danh sách việc làm.
     * 
     * @param Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function searchJobs(Request $request, $query)
    {
        // Sắp xếp
        $sort = $request->input('sort', 'newest');
        if ($sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'rating') {
            $query->orderByDesc('rating');
        } else {
            $query->orderByDesc('created_at');
        }

        // Lọc theo mức lương
        if ($request->filled('salary_range')) {
            $range = $request->input('salary_range');
            if ($range === '>100000000') {
                $query->where('salary', '>', 100000000);
            } else {
                [$min, $max] = explode('-', $range);
                $query->whereBetween('salary', [(int)$min, (int)$max]);
            }
        }

        // Lọc theo từ khóa
        if ($request->filled('keyword')) {
            $query->where('job_title', 'like', '%' . $request->input('keyword') . '%');
        }

        // Lọc theo ngành nghề đã chọn
        if ($request->filled('job_category')) {
            $categories = (array) $request->input('job_category');

            if (!in_array('all', $categories)) {
                $query->whereIn('category_id', $categories);
            }
        }

        // Lọc theo location
        if ($request->filled('location')) {
            $query->where('province_id', $request->input('location'));
        }

        // Lọc theo position
        if ($request->filled('position')) {
            $query->where('position_id', $request->input('position'));
        }

        return $query;
    }
}
