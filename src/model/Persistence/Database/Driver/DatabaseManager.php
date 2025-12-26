<?php
final class DatabaseManager
{
    public function __construct(
        private CommandExecutor $commands,
        private SelectExecutor $selects,
        private UpsertCommand $upsert,
        private TransactionRunner $transactions
    ) {}

    public function insert(
    string $table,
    array $data,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult
    {
        return $this->commands->insert($table, $data, $actorId, $correlationId);
    }

    public function update(
    string $table,
    array $data,
    array $where,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult
    {
        return $this->commands->update($table, $data, $where, $actorId, $correlationId);
    }

    public function delete(
    //DatabaseConfig $database,
    string $table,
    string $sql,
    array $where,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult
    {
        return $this->commands->delete($table, $sql, $where, $actorId, $correlationId);
    }

    public function select(string $sql): QueryResult
    {
        return $this->selects->select($sql);
    }

    public function upsert(
    string $table,
    array $key,
    array $data,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult
    {
        return $this->upsert->upsert($table, $key, $data, $actorId, $correlationId);
    }

    public function transaction(array $fn): mixed
    {
        return $this->transactions->run($fn);
    }
}
