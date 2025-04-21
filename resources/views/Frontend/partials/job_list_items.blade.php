@foreach ($jobs as $job)
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card-grid-2 hover-up">
            <div class="card-grid-2-image-left" style="padding:15px">
                <span class="flash {{ $job->is_hot == 'yes' ? '' : 'd-none' }}">
                </span>
                <div class="image-box">
                    <img src="{{ $job->employer->logo_url }}" alt="{{ $job->employer->company_name }}"
                        class="img-box-fix">
                </div>
                <div class="right-info">
                    <a class="name-job name-fix ellipsis" href="{{ route('job_detail.show', $job->slug) }}">
                        {{ $job->job_title }}
                    </a>
                    <h6>
                        <a class="name-fix ellipsis" href="{{ route('job_detail.show', $job->slug) }}">
                            {{ $job->employer->company_name }}
                        </a>
                    </h6>
                    <span class="location-small">
                        {{ $job->province->name ?? $job->location }}
                    </span>
                    <div class="tags">
                        {{ \App\Helpers\NumberHelper::formatSalary($job->salary) }} |
                        @foreach ($job->skills as $skill)
                            <a class="btn btn-grey-small mr-5" href="{{ route('jobs.index') }}">
                                {{ $skill->skill_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="paginations">
    {{ $jobs->appends(request()->query())->links('Frontend.pagination.custom') }}
</div>
