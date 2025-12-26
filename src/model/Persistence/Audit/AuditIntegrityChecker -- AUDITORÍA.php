<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
