<<<<<<< HEAD
<?php

final class DropConstraint implements SchemaCommand
{
    public function __construct(
        private string $table,
        private string $constraint
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function constraint(): string
    {
        return $this->constraint;
    }
}
=======
<?php

final class DropConstraint implements SchemaCommand
{
    public function __construct(
        private string $table,
        private string $constraint
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function constraint(): string
    {
        return $this->constraint;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
