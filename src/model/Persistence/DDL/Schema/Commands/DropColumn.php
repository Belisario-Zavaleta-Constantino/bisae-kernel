<<<<<<< HEAD
<?php


final class DropColumn implements SchemaCommand
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

=======
<?php


final class DropColumn implements SchemaCommand
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
