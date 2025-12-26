<?php

final class DropTable implements SchemaCommand
{
    public function __construct(
        private string $table
    ) {}

    public function table(): string
    {
        return $this->table;
    }
}

