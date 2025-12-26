<<<<<<< HEAD
<?php

final class TransactionContext
{
    private array $results = [];

    public function addResult(int $index, QueryResult $result): void
    {
        $this->results[$index] = $result;
    }

    public function getInsertId(int $index): int
    {
        if (!isset($this->results[$index])) {
            throw new RuntimeException("No existe resultado en índice $index");
        }

        if ($this->results[$index]->insertId === null) {
            throw new RuntimeException("El comando $index no generó insertId");
        }

        return $this->results[$index]->insertId;
    }
}
=======
<?php

final class TransactionContext
{
    private array $results = [];

    public function addResult(int $index, QueryResult $result): void
    {
        $this->results[$index] = $result;
    }

    public function getInsertId(int $index): int
    {
        if (!isset($this->results[$index])) {
            throw new RuntimeException("No existe resultado en índice $index");
        }

        if ($this->results[$index]->insertId === null) {
            throw new RuntimeException("El comando $index no generó insertId");
        }

        return $this->results[$index]->insertId;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
