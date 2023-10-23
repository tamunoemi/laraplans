<?php

namespace Tamunoemi\Laraplans;

use Illuminate\Support\ServiceProvider;
use Tamunoemi\Laraplans\SubscriptionBuilder;
use Tamunoemi\Laraplans\SubscriptionResolver;
use Tamunoemi\Laraplans\Contracts\PlanInterface;
use Tamunoemi\Laraplans\Contracts\PlanFeatureInterface;
use Tamunoemi\Laraplans\Contracts\PlanSubscriptionInterface;
use Tamunoemi\Laraplans\Contracts\SubscriptionBuilderInterface;
use Tamunoemi\Laraplans\Contracts\SubscriptionResolverInterface;
use Tamunoemi\Laraplans\Contracts\PlanSubscriptionUsageInterface;
use Illuminate\Support\Facades\Event;

class LaraplansServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laraplans');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/laraplans.php' => config_path('laraplans.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/laraplans'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraplans.php', 'laraplans');

        $this->app->bind(PlanInterface::class, config('laraplans.models.plan'));
        $this->app->bind(PlanFeatureInterface::class, config('laraplans.models.plan_feature'));
        $this->app->bind(PlanSubscriptionInterface::class, config('laraplans.models.plan_subscription'));
        $this->app->bind(PlanSubscriptionUsageInterface::class, config('laraplans.models.plan_subscription_usage'));
        $this->app->bind(SubscriptionBuilderInterface::class, SubscriptionBuilder::class);
        $this->app->bind(SubscriptionResolverInterface::class, SubscriptionResolver::class);

        Event::listen(
            \Tamunoemi\Laraplans\Events\SubscriptionSaving::class,
            \Tamunoemi\Laraplans\Listeners\PlanSubscription\SetPeriodWhenEmpty::class
        );

        Event::listen(
            \Tamunoemi\Laraplans\Events\SubscriptionSaving::class,
            \Tamunoemi\Laraplans\Listeners\PlanSubscription\DispatchEventWhenPlanChanges::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
