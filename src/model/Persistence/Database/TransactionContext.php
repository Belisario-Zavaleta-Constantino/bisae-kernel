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
