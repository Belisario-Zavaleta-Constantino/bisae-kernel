<<<<<<< HEAD
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

=======
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
