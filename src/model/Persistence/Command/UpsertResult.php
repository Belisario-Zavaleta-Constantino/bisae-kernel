<<<<<<< HEAD
<?php

final class UpsertResult
{
    public function __construct(
        public readonly string $operation, // INSERT | UPDATE
        public readonly int $affectedRows,
        public readonly ?int $insertId = null
    ) {}
}
=======
<?php

final class UpsertResult
{
    public function __construct(
        public readonly string $operation, // INSERT | UPDATE
        public readonly int $affectedRows,
        public readonly ?int $insertId = null
    ) {}
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
