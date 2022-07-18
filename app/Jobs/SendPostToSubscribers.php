<?php

namespace App\Jobs;

use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const CHUNK_COUNT = 50;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->post->postEmails()->whereNull('sent_at')->with('subscriber:id,email')->orderBy('id', 'asc')->chunkById(self::CHUNK_COUNT, function ($postEmails) {
            foreach ($postEmails as $postEmail) {
                $message = (new PostMail($this->post, $postEmail))->onQueue('post_mail');
                Mail::send($message);
                $postEmail->update([
                    'sent_at' => now(),
                ]);
            }
        });
    }
}
