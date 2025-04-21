@foreach ($latestJobs as $job)
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="card-grid-2 hover-up">
            <span class="flash {{ $job->is_hot == 'yes' ? '' : 'd-none' }}">
            </span>
            <div class="row">
                <div class="col-12">
                    <div class="card-grid-2-image-left">
                        <div class="image-box">
                            <img src="{{ \App\Helpers\CustomHelper::logoSrc($job->employer->logo) }}"
                                alt="{{ $job->job_title }}" class="img-box-fix" loading="lazy">
                        </div>
                        <div class="right-info">
                            <a class="name-job" href="{{ route('job_detail.show', $job->slug) }}">
                                {{ $job->job_title }}
                            </a>
                            <span class="location-small">
                                {{ $job->province->name ?? $job->location }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block-info">
                <h4 style="font-weight: 600;font-size: 18px">
                    <a href="{{ route('job_detail.show', $job->slug) }}">
                        {{ $job->job_title }}
                    </a>
                </h4>
                <div class="mt-5">
                    @if (!empty($job->job_type))
                        <span class="card-briefcase">{{ $job->job_type }}</span>
                    @endif
                    <span class="card-time">{{ $job->created_at->diffForHumans() }}</span>
                </div>
                <p class="font-sm color-text-paragraph mt-10">
                    {!! Str::words(preg_replace('/<img[^>]+>/i', '', $job->requirements), 10, '...') !!}
                </p>
                <div class="card-2-bottom mt-20">
                    <div class="row">
                        <div class="col-7">
                            <span class="card-text-price">Lương:</span>
                            <span class="text-muted">
                                {{ \App\Helpers\NumberHelper::formatSalary($job->salary) }}
                                <span>/Tháng</span>
                            </span>
                        </div>
                        <div class="col-5 text-end">
                            <a class="btn btn-apply-now" href="{{ route('job_detail.show', $job->slug) }}">Xem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
