<?php

namespace App\Providers;

use App\Events\Projects\ProjectArchived;
use App\Events\Projects\ProjectDeclined;
use App\Events\Projects\ProjectPublished;
use App\Events\Projects\ProjectStatusChange;
use App\Listeners\Projects\SendDeclinedMailNotification;
use App\Listeners\Projects\SendPublishedMailNotification;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            // SendEmailVerificationNotification::class,
            SendWelcomeEmail::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Facebook\FacebookExtendSocialite::class.'@handle',
            \SocialiteProviders\Google\GoogleExtendSocialite::class.'@handle',
        ],
        ProjectStatusChange::class => [
            //
        ],
        ProjectPublished::class => [
            SendPublishedMailNotification::class,
        ],
        ProjectDeclined::class => [
            SendDeclinedMailNotification::class,
        ],
        ProjectArchived::class => [
            //
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
