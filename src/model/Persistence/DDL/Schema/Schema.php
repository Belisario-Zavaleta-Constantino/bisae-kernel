<<<<<<< HEAD
<?php
final class Schema
{
    private string $table;
    private array $columns = [];
    private array $constraints = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function table(): string
    {
        return $this->table;
    }

    public function addColumn(Column $column): self
    {
        $this->columns[$column->name()] = $column;
        return $this;
    }

    public function addConstraint(Constraint $constraint): self
    {
        $this->constraints[] = $constraint;
        return $this;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function constraints(): array
    {
        return $this->constraints;
    }
}
=======
<?php
final class Schema
{
    private string $table;
    private array $columns = [];
    private array $constraints = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function table(): string
    {
        return $this->table;
    }

    public function addColumn(Column $column): self
    {
        $this->columns[$column->name()] = $column;
        return $this;
    }

    public function addConstraint(Constraint $constraint): self
    {
        $this->constraints[] = $constraint;
        return $this;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function constraints(): array
    {
        return $this->constraints;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
