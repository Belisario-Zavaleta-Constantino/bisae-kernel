<<<<<<< HEAD
<?php
final class TransactionResult
{
    private function __construct(
        public readonly bool $success,
        public readonly array $results,
        public readonly ?string $error
    ) {}

    public static function success(array $results): self
    {
        return new self(true, $results, null);
    }

    public static function failure(string $error, array $results): self
    {
        return new self(false, $results, $error);
    }
}
=======
<?php
final class TransactionResult
{
    private function __construct(
        public readonly bool $success,
        public readonly array $results,
        public readonly ?string $error
    ) {}

    public static function success(array $results): self
    {
        return new self(true, $results, null);
    }

    public static function failure(string $error, array $results): self
    {
        return new self(false, $results, $error);
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
