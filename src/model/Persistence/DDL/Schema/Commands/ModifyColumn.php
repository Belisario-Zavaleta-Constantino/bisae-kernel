<?php

final class ModifyColumn implements SchemaCommand
{
    public function __construct(
        private string $table,
        private Column $column
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function column(): Column
    {
        return $this->column;
    }
}

