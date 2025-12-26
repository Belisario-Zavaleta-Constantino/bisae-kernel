<<<<<<< HEAD
<?php
namespace bisae\kernel\core\db\schema;

use InvalidArgumentException;

final class ColumnDefinition
{
    public function __construct(
        public string $name,
        public string $type,
        public ?int $length = null,
        public bool $nullable = true,
        public bool $primary = false,
        public bool $unique = false,
        public mixed $default = null,
        public ?array $enum = null,
        public bool $autoIncrement = false
    ) {}
}
=======
<?php
namespace bisae\kernel\core\db\schema;

use InvalidArgumentException;

final class ColumnDefinition
{
    public function __construct(
        public string $name,
        public string $type,
        public ?int $length = null,
        public bool $nullable = true,
        public bool $primary = false,
        public bool $unique = false,
        public mixed $default = null,
        public ?array $enum = null,
        public bool $autoIncrement = false
    ) {}
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
