<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\PostEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Post $post, public PostEmail $postEmail)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New message from ' . $this->post->website->name;
        return $this
            ->subject($subject)
            ->to($this->postEmail->subscriber->email)
            ->markdown('mails.post_mail', [
                'websiteName' => $this->post->website->name,
                'content' => $this->post->content
            ]);
    }
}
