<?php

final class DropConstraint implements SchemaCommand
{
    public function __construct(
        private string $table,
        private string $constraint
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function constraint(): string
    {
        return $this->constraint;
    }
}
