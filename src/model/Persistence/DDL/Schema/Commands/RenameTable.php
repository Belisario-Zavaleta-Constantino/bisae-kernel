<?php

final class RenameTable implements SchemaCommand
{
    public function __construct(
        private string $from,
        private string $to
    ) {}

    public function from(): string
    {
        return $this->from;
    }

    public function to(): string
    {
        return $this->to;
    }
}

