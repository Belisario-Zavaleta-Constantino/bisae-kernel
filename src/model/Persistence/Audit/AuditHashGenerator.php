<<<<<<< HEAD
<?php
final class AuditHashGenerator
{
    public static function generate(array $data, ?string $previousHash): string
    {
        $canonical = json_encode([
            'operation'      => $data['operation'],
            'database'       => $data['database'],
            'table_name'     => $data['table_name'],
            'actor_id'       => $data['actor_id'],
            'affected_rows'  => $data['affected_rows'],
            'payload'        => $data['payload'],
            'correlation_id' => $data['correlation_id'],
            'created_at'     => $data['created_at'],
            'previous_hash'  => $previousHash,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return hash('sha256', $canonical);
    }
}
=======
<?php
final class AuditHashGenerator
{
    public static function generate(array $data, ?string $previousHash): string
    {
        $canonical = json_encode([
            'operation'      => $data['operation'],
            'database'       => $data['database'],
            'table_name'     => $data['table_name'],
            'actor_id'       => $data['actor_id'],
            'affected_rows'  => $data['affected_rows'],
            'payload'        => $data['payload'],
            'correlation_id' => $data['correlation_id'],
            'created_at'     => $data['created_at'],
            'previous_hash'  => $previousHash,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return hash('sha256', $canonical);
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
