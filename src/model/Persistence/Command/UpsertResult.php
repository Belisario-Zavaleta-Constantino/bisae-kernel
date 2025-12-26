<?php

final class UpsertResult
{
    public function __construct(
        public readonly string $operation, // INSERT | UPDATE
        public readonly int $affectedRows,
        public readonly ?int $insertId = null
    ) {}
}
