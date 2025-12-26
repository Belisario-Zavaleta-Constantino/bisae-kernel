<?php

/*final class InsertCommand implements TransactionCommand
{
    public function __construct(
        private string $table,
        private array $data,
        private ?int $dependsOn = null,
        private ?string $foreignKey = null
    ) {}

    public function execute(DatabaseDriver $driver, TransactionContext $context): QueryResult
    {
        if ($this->dependsOn !== null && $this->foreignKey !== null) {
            $this->data[$this->foreignKey] = $context->getInsertId($this->dependsOn);
        }

        return $driver->insert($this->table, $this->data);
    }
}*/


final class InsertCommand implements TransactionCommand
{
    public function __construct(
        private string $table,
        private array $data,
        private ?int $dependsOn = null,
        private ?string $foreignKey = null
    ) {}

    public function execute(
        DatabaseDriver $driver,
        TransactionContext $context,
        CommandExecutor $executor
    ): QueryResult {
        if ($this->dependsOn !== null && $this->foreignKey !== null) {
            $this->data[$this->foreignKey] =
                $context->getInsertId($this->dependsOn);
        }

        return $executor->insert($this->table, $this->data);
    }
}
