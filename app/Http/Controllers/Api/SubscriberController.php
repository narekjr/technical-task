<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SubscriberStoreRequest;
use App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;

class SubscriberController extends AbstractController
{
    /**
     * Store new subscriber
     *
     * @param SubscriberStoreRequest $request
     * @param WebsiteService $websiteService
     * @return JsonResponse
     */
    public function store(SubscriberStoreRequest $request, WebsiteService $websiteService)
    {
        $subscriber = $websiteService->subscribeUser($request->validated());

        return $this->response('Subscribed', $subscriber);
    }
}
