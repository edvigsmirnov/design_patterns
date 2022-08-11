<?php

namespace Patterns;

class SingletonPattern
{
    /*
    Creational pattern
    Only one globally available instance

    Private constructors
    Private clone methods
    Static instance property

    Considered an anti-pattern because it introduces global state
    Should be used properly

    Used inside such patterns as:
    Dependency Injection
    Factories
    Builders
    Facades

    Example in Alerts class
    */
}
final class Alerts
{
    private array $alerts = [];

    private static Alerts $instance;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance(): self
    {
        if (!isset(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @return $this
     */
    public function add(string $type, string $message): self
    {
        $this->alerts[$type] = $message;
        return $this;
    }

    public function get(string $type): array
    {
        return $this->alerts[$type] ?? [];
    }

    public function all(): array
    {
        return $this->alerts;
    }

}
