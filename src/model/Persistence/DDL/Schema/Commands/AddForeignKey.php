<?php

final class AddForeignKey implements SchemaCommand
{
    public function __construct(
        private string $table,
        private string $column,
        private string $referenceTable,
        private string $referenceColumn
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function column(): string
    {
        return $this->column;
    }

    public function referenceTable(): string
    {
        return $this->referenceTable;
    }

    public function referenceColumn(): string
    {
        return $this->referenceColumn;
    }
}
