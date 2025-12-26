<<<<<<< HEAD
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

=======
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
