<?php

namespace App\Services;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class WebsiteService extends AbstractService
{
    public const PER_PAGE = 20;

    /**
     * Get paginated websites
     *
     * @param int $page
     * @return Paginator
     */
    public function getPaginatedWebsites(int $page): Paginator
    {
        $cacheKey = 'websites_' . $page;
        return Cache::remember($cacheKey, now()->addHour(), function () use ($page) {
            return Website::query()->orderBy('id')->simplePaginate(self::PER_PAGE, ['id', 'name', 'url'], page: $page);
        });
    }

    /**
     * Subscribe User
     *
     * @param array $data
     * @return array
     */
    public function subscribeUser(array $data): array
    {
        return Subscriber::create($data)->only('website_id', 'email');
    }
}
