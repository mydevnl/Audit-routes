<?php

declare(strict_types=1);

namespace MyDev\AuditRoutes\Traits;

use Closure;
use MyDev\AuditRoutes\Repositories\RouteInterface;

trait ConditionalAuditable
{
    /** @var array<int, Closure(RouteInterface): bool> $conditions */
    protected array $conditions = [];

    /** @param Closure(RouteInterface): bool $condition */
    public function when(Closure $condition): self
    {
        $this->conditions[] = $condition;

        return $this;
    }

    protected function validateConditions(RouteInterface $route): bool
    {
        foreach ($this->conditions as $condition) {
            if (!$condition($route)) {
                return false;
            }
        }

        return true;
    }
}