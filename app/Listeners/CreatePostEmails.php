<?php

namespace App\Listeners;

use App\Enums\PostStatusEnum;
use App\Events\PostCreated;
use App\Models\PostEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePostEmails implements ShouldQueue
{
    public const CHUNK_COUNT = 50;

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public ?string $queue = 'create_post_emails';

    /**
     * Handle the event.
     *
     * @param PostCreated $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        if (!$event->post->subscribers()->exists()) {
            $event->post->update([
                'status' => PostStatusEnum::Sent->value,
            ]);

            return;
        }

        $event->post->subscribers()->select('subscribers.id', 'subscribers.website_id')->chunk(self::CHUNK_COUNT, function ($subscribers) use ($event) {
            foreach ($subscribers as $subscriber) {
                PostEmail::query()->firstOrCreate([
                    'post_id' => $event->post->id,
                    'subscriber_id' => $subscriber->id,
                ]);
            }
        });

        $event->post->update([
            'status' => PostStatusEnum::Ready->value
        ]);
    }
}
