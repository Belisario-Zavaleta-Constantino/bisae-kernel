<?php
namespace bisae\kernel\core\db\schema\mysql;

use bisae\kernel\core\db\schema\ColumnDefinition;

final class ColumnCompiler
{
    public static function compile(ColumnDefinition $col): string
    {
        $sql = "`{$col->name}` {$col->type}";

        if ($col->length) {
            $sql .= "({$col->length})";
        }

        if ($col->enum) {
            $values = implode("','", $col->enum);
            $sql = "`{$col->name}` ENUM('{$values}')";
        }

        if (!$col->nullable) {
            $sql .= " NOT NULL";
        }

        if ($col->default !== null) {
            $sql .= " DEFAULT '{$col->default}'";
        }

        if ($col->autoIncrement) {
            $sql .= " AUTO_INCREMENT";
        }

        if ($col->primary) {
            $sql .= " PRIMARY KEY";
        } elseif ($col->unique) {
            $sql .= " UNIQUE";
        }

        return $sql;
    }
}
