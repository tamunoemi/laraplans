<?php

namespace Tamunoemi\Laraplans\Listeners\PlanSubscription;

use Tamunoemi\Laraplans\Events\SubscriptionSaving;

class SetPeriodWhenEmpty
{
    /**
     * Handle event.
     *
     * @param SubscriptionSaving $event
     * @return void
     */
    public function handle(SubscriptionSaving $event)
    {
        // Set period if it wasn't set
        if (! $event->subscription->ends_at) {
            $event->subscription->setNewPeriod();
        }
    }
}