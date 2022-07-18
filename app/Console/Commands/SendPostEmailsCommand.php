<?php

namespace App\Console\Commands;

use App\Enums\PostStatusEnum;
use App\Jobs\SendPostToSubscribers;
use App\Models\Post;
use Illuminate\Console\Command;

class SendPostEmailsCommand extends Command
{
    public const CHUNK_COUNT = 50;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post-emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Post Emails';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('Queueing posts to send.');
        Post::where('status', PostStatusEnum::Ready->value)->with('website:id,name')->chunkById(self::CHUNK_COUNT, function ($posts) {
            foreach ($posts as $post) {
                SendPostToSubscribers::dispatch($post)->onQueue('send_post_to_subscribers');
                $post->update([
                    'status' => PostStatusEnum::Sent->value
                ]);
            }
        });
        $this->line('Done.');
        return 0;
    }
}
