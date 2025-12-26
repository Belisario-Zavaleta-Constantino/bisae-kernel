<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
