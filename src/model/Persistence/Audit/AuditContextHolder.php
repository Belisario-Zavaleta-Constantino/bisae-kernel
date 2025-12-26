<<<<<<< HEAD
<?php
final class AuditContextHolder
{
    private static ?AuditContext $current = null;

    public static function set(AuditContext $context): void
    {
        self::$current = $context;
    }

    public static function get(): AuditContext
    {
        if (!self::$current) {
            throw new RuntimeException('AuditContext not initialized');
        }
        return self::$current;
    }

    public static function clear(): void
    {
        self::$current = null;
    }
}
=======
<?php
final class AuditContextHolder
{
    private static ?AuditContext $current = null;

    public static function set(AuditContext $context): void
    {
        self::$current = $context;
    }

    public static function get(): AuditContext
    {
        if (!self::$current) {
            throw new RuntimeException('AuditContext not initialized');
        }
        return self::$current;
    }

    public static function clear(): void
    {
        self::$current = null;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
