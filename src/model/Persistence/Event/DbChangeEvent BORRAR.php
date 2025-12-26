<<<<<<< HEAD
<?php
final class DbChangeEvent
{
    public function __construct(
        public readonly string $operation,
        public readonly string $table,
        public readonly array  $where,
        public readonly int    $affectedRows,

        public readonly string $database,
        public readonly string $correlationId,

        public readonly ?array $before = null,
        public readonly ?array $after = null,

        public readonly ?int $actorId = null,
        public readonly \DateTimeImmutable $occurredAt = new \DateTimeImmutable(),
		
		
		public readonly AuditContext $auditContext,
		public readonly array $payload,
    ) {}
}
=======
<?php
final class DbChangeEvent
{
    public function __construct(
        public readonly string $operation,
        public readonly string $table,
        public readonly array  $where,
        public readonly int    $affectedRows,

        public readonly string $database,
        public readonly string $correlationId,

        public readonly ?array $before = null,
        public readonly ?array $after = null,

        public readonly ?int $actorId = null,
        public readonly \DateTimeImmutable $occurredAt = new \DateTimeImmutable(),
		
		
		public readonly AuditContext $auditContext,
		public readonly array $payload,
    ) {}
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
