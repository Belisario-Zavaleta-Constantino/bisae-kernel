<?php
final class AuditContext
{
    /** @var DatabaseDriver[] */
    private array $drivers;

    public function __construct(array $drivers)
    {
        $this->drivers = $drivers;
    }

    /** @return DatabaseDriver[] */
    public function drivers(): array
    {
        return $this->drivers;
    }
}
