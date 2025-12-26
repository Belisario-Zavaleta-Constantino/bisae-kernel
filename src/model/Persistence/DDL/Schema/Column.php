<<<<<<< HEAD
<?php
final class Column
{
    public function __construct(
        private string $name,
        private string $type,
        private bool $nullable = false,
        private bool $autoIncrement = false
    ) {}

    public static function int(string $name): self
    {
        return new self($name, 'int');
    }

    public static function string(string $name): self
    {
        return new self($name, 'varchar');
    }

    public function nullable(): self
    {
        $this->nullable = true;
        return $this;
    }

    public function autoIncrement(): self
    {
        $this->autoIncrement = true;
        return $this;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }
}
=======
<?php
final class Column
{
    public function __construct(
        private string $name,
        private string $type,
        private bool $nullable = false,
        private bool $autoIncrement = false
    ) {}

    public static function int(string $name): self
    {
        return new self($name, 'int');
    }

    public static function string(string $name): self
    {
        return new self($name, 'varchar');
    }

    public function nullable(): self
    {
        $this->nullable = true;
        return $this;
    }

    public function autoIncrement(): self
    {
        $this->autoIncrement = true;
        return $this;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
