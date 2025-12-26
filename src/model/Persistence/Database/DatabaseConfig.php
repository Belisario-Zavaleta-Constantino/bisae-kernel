<?php
//namespace bisae\kernel\core\db;

final class DatabaseConfig
{
    public function __construct(
        public readonly string $host,
        public readonly string $user,
        public readonly string $password,
        public readonly string $database,
        public readonly int $port = 3306,
        public readonly string $charset = 'utf8mb4',
		public readonly bool $readOnly = false
    ) {}
}
