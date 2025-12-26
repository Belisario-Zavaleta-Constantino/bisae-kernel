<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\audit\event;


final class DbChangeEvent
{
    public function __construct(
        public readonly string $operation,
        public readonly string $database,
        public readonly string $table,
        public readonly array  $where,
        public readonly int    $affectedRows,

        // nuevos campos
        public readonly ?array $before = null,
        public readonly ?array $after = null,
		 public readonly string $correlationId,

        public readonly ?int   $actorId = null,
        public readonly ?string $ip = null,
        public readonly ?string $userAgent = null,

        public readonly \DateTimeImmutable $occurredAt = new \DateTimeImmutable(),
		
		public ?AuditContext $auditContext = null
		
		
    ) {
		
		$this->auditContext = $auditContext ?? AuditContextHolder::get();
		
		}
}
=======
<?php
//namespace bisae\kernel\core\audit\event;


final class DbChangeEvent
{
    public function __construct(
        public readonly string $operation,
        public readonly string $database,
        public readonly string $table,
        public readonly array  $where,
        public readonly int    $affectedRows,

        // nuevos campos
        public readonly ?array $before = null,
        public readonly ?array $after = null,
		 public readonly string $correlationId,

        public readonly ?int   $actorId = null,
        public readonly ?string $ip = null,
        public readonly ?string $userAgent = null,

        public readonly \DateTimeImmutable $occurredAt = new \DateTimeImmutable(),
		
		public ?AuditContext $auditContext = null
		
		
    ) {
		
		$this->auditContext = $auditContext ?? AuditContextHolder::get();
		
		}
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
