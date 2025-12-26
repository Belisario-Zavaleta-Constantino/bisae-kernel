<<<<<<< HEAD
<?php

final class AddColumn implements SchemaCommand
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

=======
<?php

final class AddColumn implements SchemaCommand
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
