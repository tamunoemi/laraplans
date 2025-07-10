<?php

namespace Tamunoemi\Laraplans\Models;

use Illuminate\Database\Eloquent\Model;
use Tamunoemi\Laraplans\Traits\BelongsToPlan;
use Tamunoemi\Laraplans\Contracts\PlanFeatureInterface;

class PlanFeature extends Model implements PlanFeatureInterface
{
    use BelongsToPlan;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Get feature usage.
     *
     * This will return all related
     * subscriptions usages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usage()
    {
        return $this->hasMany(config('laraplans.models.plan_subscription_usage'));
    }
}
