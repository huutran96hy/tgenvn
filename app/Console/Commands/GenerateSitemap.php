<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Job;
use App\Models\Employer;
use App\Models\News;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Tạo sitemap.xml cho website';

    public function handle()
    {
        $baseUrl = config('app.url');
        $sitemap = Sitemap::create();

        // Helper tạo URL trong sitemap
        $addUrl = function (string $path, $lastmod = null, string $freq = 'daily', float $priority = 0.5) use ($sitemap, $baseUrl) {
            $sitemap->add(
                Url::create($baseUrl . $path) // $path: đường dẫn tương đối, ví dụ: '/viec-lam'
                    ->setLastModificationDate($lastmod ?? now()) // $lastmod: thời gian chỉnh sửa lần cuối (nếu null thì lấy thời gian hiện tại)
                    ->setChangeFrequency($freq) // $freq: tần suất thay đổi nội dung (daily, weekly, monthly, yearly...)
                    ->setPriority($priority) // $priority: độ ưu tiên của trang (0.0 đến 1.0)
            );
        };

        $staticRoutes = [
            ['/', null, 'daily', 1.0],
            ['/viec-lam', null, 'daily', 0.8],
            ['/viec-lam-tot-nhat', null, 'daily', 0.8],
            ['/viec-lam-goi-y', null, 'daily', 0.8],
            ['/cong-ty', null, 'daily', 0.9],
            ['/cong-ty-hang-dau', null, 'daily', 0.9],
            ['/tin-tuc', null, 'daily', 0.7],
            ['/lien-he', null, 'yearly', 0.6],
        ];

        foreach ($staticRoutes as [$path, $mod, $freq, $priority]) {
            $addUrl($path, $mod, $freq, $priority);
        }

        // Chunk job
        Job::select('slug', 'updated_at')->chunk(100, function ($jobs) use ($addUrl) {
            foreach ($jobs as $job) {
                $addUrl("/viec-lam/{$job->slug}", $job->updated_at, 'daily', 0.6);
            }
        });

        // Chunk employer
        Employer::select('slug', 'updated_at')->chunk(100, function ($employers) use ($addUrl) {
            foreach ($employers as $employer) {
                $addUrl("/cong-ty/{$employer->slug}", $employer->updated_at, 'weekly', 0.7);
            }
        });

        // Chunk news
        News::select('slug', 'updated_at')->chunk(100, function ($newsList) use ($addUrl) {
            foreach ($newsList as $news) {
                $addUrl("/tin-tuc/{$news->slug}", $news->updated_at, 'weekly', 0.7);
            }
        });

        // Ghi sitemap.xml
        try {
            $sitemap->writeToFile(public_path('sitemap.xml'));
            $this->info('✅ sitemap.xml đã được tạo!');
        } catch (\Exception $e) {
            $this->error(' Lỗi khi ghi sitemap.xml: ' . $e->getMessage());
        }

        // Ghi robots.txt
        try {
            $sitemapUrl = url('sitemap.xml');
            $robotsContent = "User-agent: *\nDisallow: /admin\n\nSitemap: $sitemapUrl\n";
            file_put_contents(public_path('robots.txt'), $robotsContent);
            $this->info('✅ robots.txt đã được cập nhật!');
        } catch (\Exception $e) {
            $this->error('Lỗi khi ghi robots.txt: ' . $e->getMessage());
        }
    }
}
