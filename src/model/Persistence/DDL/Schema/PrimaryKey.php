<?php
final class PrimaryKey implements Constraint
{
    public function __construct(private string $column) {}

    public function type(): string
    {
        return 'primary';
    }

    public function column(): string
    {
        return $this->column;
    }
}
