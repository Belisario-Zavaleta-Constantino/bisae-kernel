<<<<<<< HEAD
<?php
/*final class AuditDbChangeListener
{
    public function __construct(
        private AuditLogger $logger
    ) {}

    public function __invoke(DbChangeEvent $event): void
    {
        foreach ($event->auditContext->drivers() as $driver) {
            $this->logger->log($event, $driver);
        }
		echo "PRUEBA LISTERNER:<BR/>";
		var_dump(count($event->auditContext->drivers()));
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
    }
}*/


final class AuditDbChangeListener
{
    public function __construct(
        private AuditLogger $logger
    ) {}

    public function handle(DbChangeEvent $event): void
    {
        foreach ($event->auditContext->drivers() as $driver) {
            $this->logger->log($event, $driver);
        }

        echo "PRUEBA LISTENER<br/>";
        var_dump(count($event->auditContext->drivers()));
    }
=======
<?php
/*final class AuditDbChangeListener
{
    public function __construct(
        private AuditLogger $logger
    ) {}

    public function __invoke(DbChangeEvent $event): void
    {
        foreach ($event->auditContext->drivers() as $driver) {
            $this->logger->log($event, $driver);
        }
		echo "PRUEBA LISTERNER:<BR/>";
		var_dump(count($event->auditContext->drivers()));
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
		echo "<BR/>";
    }
}*/


final class AuditDbChangeListener
{
    public function __construct(
        private AuditLogger $logger
    ) {}

    public function handle(DbChangeEvent $event): void
    {
        foreach ($event->auditContext->drivers() as $driver) {
            $this->logger->log($event, $driver);
        }

        echo "PRUEBA LISTENER<br/>";
        var_dump(count($event->auditContext->drivers()));
    }
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
}