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
