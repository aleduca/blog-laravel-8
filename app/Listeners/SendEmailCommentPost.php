<?php

namespace App\Listeners;

use App\Events\CommentPost;
use App\Mail\CommentPost as MailCommentPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCommentPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentPost  $event
     * @return void
     */
    public function handle(CommentPost $event)
    {
        // dd($event->user->email);
        Mail::to($event->user->email)
        ->send(new MailCommentPost($event->user, $event->post));
    }
}
