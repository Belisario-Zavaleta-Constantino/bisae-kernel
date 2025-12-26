<?php
final class AuditIntegrityChecker
{
    public function verify(array $events): void
    {
        foreach ($events as $i => $event) {
            $expected = AuditHashGenerator::generate(
                data: $event,
                previousHash: $events[$i - 1]['hash'] ?? null
            );

            if ($expected !== $event['hash']) {
                throw new AuditIntegrityViolation(
                    'Audit corrupted at ID ' . $event['id']
                );
            }
        }
    }
}
