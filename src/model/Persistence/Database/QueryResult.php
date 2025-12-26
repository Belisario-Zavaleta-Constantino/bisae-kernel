<?php
//namespace bisae\kernel\core\db\result;

final class QueryResult
{
    public function __construct(
        public readonly bool $success,
        public readonly array $rows = [],
        public readonly int $affectedRows = 0,
        public readonly ?int $insertId = null,
        public readonly ?string $error = null
    ) {}

    public function isSuccess(): bool
    {
        return $this->success;
    }
}
