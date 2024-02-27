<?php

namespace App\Listeners\Projects;

use App\Events\Projects\ProjectPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPublishedMailNotification
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
     * @param  \App\Events\Projects\ProjectPublished  $event
     * @return void
     */
    public function handle(ProjectPublished $event)
    {
        $mail = new \App\Mail\Projects\ProjectPublished($event->project);
        Mail::to($event->project->user->email)->send($mail);
    }
}
