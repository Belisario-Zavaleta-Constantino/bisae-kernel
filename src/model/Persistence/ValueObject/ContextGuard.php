<<<<<<< HEAD
<?php
final class ContextGuard
{
    private ?string $expectedDatabase = null;

    public function expect(string $database): void
    {
        $this->expectedDatabase = $database;
    }

    public function validate(DatabaseConfig $context): void
    {
        if ($this->expectedDatabase === null) {
            return;
        }

        if ($context->database !== $this->expectedDatabase) {
            throw new \LogicException(
                "Invalid database context. Expected {$this->expectedDatabase}, got {$context->database}"
            );
        }
    }

    public function clear(): void
    {
        $this->expectedDatabase = null;
    }
}
=======
<?php
final class ContextGuard
{
    private ?string $expectedDatabase = null;

    public function expect(string $database): void
    {
        $this->expectedDatabase = $database;
    }

    public function validate(DatabaseConfig $context): void
    {
        if ($this->expectedDatabase === null) {
            return;
        }

        if ($context->database !== $this->expectedDatabase) {
            throw new \LogicException(
                "Invalid database context. Expected {$this->expectedDatabase}, got {$context->database}"
            );
        }
    }

    public function clear(): void
    {
        $this->expectedDatabase = null;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
