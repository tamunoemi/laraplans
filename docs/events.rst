Events
======

The following are the events fired by the package:

- ``Tamunoemi\Laraplans\Events\SubscriptionCreated``: Fired when a subscription is created.
- ``Tamunoemi\Laraplans\Events\SubscriptionRenewed``: Fired when a subscription is renewed using the ``renew()`` method.
- ``Tamunoemi\Laraplans\Events\SubscriptionCanceled``: Fired when a subscription is canceled using the ``cancel()`` method.
- ``Tamunoemi\Laraplans\Events\SubscriptionPlanChanged``: Fired when a subscription's plan is changed; it will be fired once the ``PlanSubscription`` model is saved. Plan change is determined by comparing the original and current value of ``plan_id``.