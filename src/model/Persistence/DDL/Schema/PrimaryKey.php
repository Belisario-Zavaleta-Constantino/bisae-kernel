<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
