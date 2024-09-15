<?php

declare(strict_types=1);

namespace MyDev\AuditRoutes\Repositories;

use Symfony\Component\Routing\Route;

class SymfonyRoute implements RouteInterface
{
    /**
     * @param ?string $name
     * @param Route $route
     * @return void
     */
    public function __construct(protected ?string $name, protected Route $route)
    {
    }

    /**
     * @param ?string $name
     * @param Route $route
     * @return self
     */
    public static function for(?string $name, Route $route): self
    {
        return new self($name, $route);
    }

    /** @return string */
    public function getName(): string
    {
        return (string) $this->name;
    }

    /** @return array<int, string | callable> */
    public function getMiddlewares(): array
    {
        return [];
    }

    /** @return string */
    public function getClass(): string
    {
        return $this->route::class;
    }
}
