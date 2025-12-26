<?php

final class AddColumnAfter implements SchemaCommand
{
    public function __construct(
        private string $table,
        private Column $column,
        private string $after
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function column(): Column
    {
        return $this->column;
    }

    public function after(): string
    {
        return $this->after;
    }
}

