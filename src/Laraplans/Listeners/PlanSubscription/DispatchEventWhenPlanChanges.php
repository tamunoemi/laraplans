<?php

namespace Tamunoemi\Laraplans\Listeners\PlanSubscription;

use Tamunoemi\Laraplans\Events\SubscriptionSaving;
use Tamunoemi\Laraplans\Events\SubscriptionPlanChanged;

class DispatchEventWhenPlanChanges
{
    /**
     * Handle event.
     *
     * @param SubscriptionSaving $event
     * @return void
     */
    public function handle(SubscriptionSaving $event)
    {
        $planId = $event->subscription->getOriginal('plan_id');

        // check if there is a plan and it is changed
        if ($planId && $planId !== $event->subscription->plan_id) {
            event(new SubscriptionPlanChanged($event->subscription));
        }
    }
}