<?php

namespace Tamunoemi\Laraplans\Contracts;

interface PlanSubscriptionUsageInterface
{
    public function feature();
    public function subscription();
    public function scopeByFeatureCode($query, $feature_code);
    public function isExpired();
}
