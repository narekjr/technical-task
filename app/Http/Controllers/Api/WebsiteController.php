<?php

namespace App\Http\Controllers\Api;

use App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;

class WebsiteController extends AbstractController
{
    /**
     * List websites
     *
     * @param WebsiteService $websiteService
     * @return JsonResponse
     */
    public function index(WebsiteService $websiteService)
    {
        $page = Paginator::resolveCurrentPage();
        $websites = $websiteService->getPaginatedWebsites($page);

        return $this->response('Success', $websites);
    }
}
