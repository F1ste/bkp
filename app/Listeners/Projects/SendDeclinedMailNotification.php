<?php

namespace App\Listeners\Projects;

use App\Events\Projects\ProjectDeclined;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDeclinedMailNotification
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
     * @param  \App\Events\Projects\ProjectDeclined  $event
     * @return void
     */
    public function handle(ProjectDeclined $event)
    {
        $mail = new \App\Mail\Projects\ProjectDeclined($event->project);
        Mail::to($event->project->user->email)->send($mail);
    }
}
