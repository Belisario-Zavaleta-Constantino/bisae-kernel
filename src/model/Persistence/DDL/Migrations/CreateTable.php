<<<<<<< HEAD
<?php
final class CreateTable implements SchemaCommand
{
    public function __construct(
        private Schema $schema,
        private bool $ifNotExists = true
    ) {}

    public function schema(): Schema
    {
        return $this->schema;
    }

    public function ifNotExists(): bool
    {
        return $this->ifNotExists;
    }
}
=======
<?php
final class CreateTable implements SchemaCommand
{
    public function __construct(
        private Schema $schema,
        private bool $ifNotExists = true
    ) {}

    public function schema(): Schema
    {
        return $this->schema;
    }

    public function ifNotExists(): bool
    {
        return $this->ifNotExists;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
