<?php

namespace Tamunoemi\Laraplans\Events;

use Tamunoemi\Laraplans\Models\PlanSubscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionSaved
{
    use SerializesModels;

    /**
     * @var \Tamunoemi\Laraplans\Models\PlanSubscription
     */
    public $subscription;

    /**
     * Create a new event instance.
     *
     * @param  \Laraplans\Models\PlanSubscription  $subscription
     * @return void
     */
    public function __construct(PlanSubscription $subscription)
    {
        $this->subscription = $subscription;
    }
}
