<?php

final class AddUnique implements SchemaCommand
{
    public function __construct(
        private string $table,
        private string $column
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function column(): string
    {
        return $this->column;
    }
}

