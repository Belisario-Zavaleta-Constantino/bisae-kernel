<<<<<<< HEAD
<?php
final class CorrelationId
{
    public static function generate(): string
    {
        return bin2hex(random_bytes(16));
    }
}
=======
<?php
final class CorrelationId
{
    public static function generate(): string
    {
        return bin2hex(random_bytes(16));
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
