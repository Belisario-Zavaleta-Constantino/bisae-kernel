<?php
/*final class AuditLogger
{
    public function __construct(
        private DatabaseDriver $db
    ) {}

    public function log(array $event): void
    {
        $previousHash = $this->getPreviousHash();

        $event['hash'] = AuditHashGenerator::generate(
            data: $event,
            previousHash: $previousHash
        );

        $stmt = $this->db->prepare("
            INSERT INTO s_audit (
                operation,
                database,
                table_name,
                actor_id,
                affected_rows,
                payload,
                correlation_id,
                created_at,
                previous_hash,
                hash
            ) VALUES (
                :operation,
                :database,
                :table_name,
                :actor_id,
                :affected_rows,
                :payload,
                :correlation_id,
                :created_at,
                :previous_hash,
                :hash
            )
        ");

        $stmt->execute([
            ...$event,
            'previous_hash' => $previousHash
        ]);
    }

    private function getPreviousHash(): ?string
    {
        $stmt = $this->db->query(
            "SELECT hash FROM s_audit ORDER BY sid DESC LIMIT 1"
        );

        return $stmt->fetchColumn() ?: null;
    }
}*/



final class AuditLogger
{
    public function log(DbChangeEvent $event, DatabaseDriver $db): void
    {
        $previousHash = $this->getPreviousHash($db);

        $auditData = [
            'operation'      => $event->operation,
            'database'       => $event->database,
            'table_name'     => $event->table,
            'actor_id'       => $event->actorId,
            'affected_rows'  => $event->affectedRows,
            'payload'        => json_encode($event->payload, JSON_UNESCAPED_UNICODE),
            'correlation_id' => $event->correlationId,
            'created_at'     => $event->occurredAt->format('Y-m-d H:i:s'),
        ];

        $hash = AuditHashGenerator::generate(
            data: $auditData,
            previousHash: $previousHash
        );

        $stmt = $db->prepare("
            INSERT INTO s_audit (
                operation,
                database,
                table_name,
                actor_id,
                affected_rows,
                payload,
                correlation_id,
                created_at,
                previous_hash,
                hash
            ) VALUES (
                :operation,
                :database,
                :table_name,
                :actor_id,
                :affected_rows,
                :payload,
                :correlation_id,
                :created_at,
                :previous_hash,
                :hash
            )
        ");

        $stmt->execute([
            ...$auditData,
            'previous_hash' => $previousHash,
            'hash'          => $hash,
        ]);
    }

    private function getPreviousHash(DatabaseDriver $db): ?string
    {
        $stmt = $db->query(
            "SELECT hash FROM s_audit ORDER BY sid DESC LIMIT 1"
        );

        return $stmt->fetchColumn() ?: null;
    }
}
