<<<<<<< HEAD
<?php

final class DropTable implements SchemaCommand
{
    public function __construct(
        private string $table
    ) {}

    public function table(): string
    {
        return $this->table;
    }
}

=======
<?php

final class DropTable implements SchemaCommand
{
    public function __construct(
        private string $table
    ) {}

    public function table(): string
    {
        return $this->table;
    }
}

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
