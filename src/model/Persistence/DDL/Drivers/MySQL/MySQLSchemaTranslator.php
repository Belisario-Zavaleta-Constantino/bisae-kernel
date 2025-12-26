<?php
final class MySQLSchemaTranslator
{
    public function translate(SchemaCommand $command): string
    {
        return match (true) {

            // TABLES
            $command instanceof CreateTable       => $this->createTable($command),
            $command instanceof DropTable         => $this->dropTable($command),
            $command instanceof RenameTable       => $this->renameTable($command),

            // COLUMNS
            $command instanceof AddColumn         => $this->addColumn($command),
            $command instanceof AddColumnAfter    => $this->addColumnAfter($command),
            $command instanceof ModifyColumn      => $this->modifyColumn($command),
            $command instanceof DropColumn        => $this->dropColumn($command),

            // CONSTRAINTS
            $command instanceof AddPrimaryKey     => $this->addPrimaryKey($command),
            $command instanceof AddUnique         => $this->addUnique($command),
            $command instanceof AddForeignKey     => $this->addForeignKey($command),
            $command instanceof DropConstraint    => $this->dropConstraint($command),

            default => throw new RuntimeException(
                'SchemaCommand no soportado: ' . $command::class
            )
        };
    }

    /* =========================
     * TABLES
     * ========================= */

    private function createTable(CreateTable $command): string
    {
        $schema = $command->schema();

        $definitions = [];

        foreach ($schema->columns() as $column) {
            $definitions[] = $this->column($column);
        }

        foreach ($schema->constraints() as $constraint) {
            $definitions[] = $this->constraint($constraint);
        }

        return sprintf(
            'CREATE TABLE %s%s (%s) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
            $command->ifNotExists() ? 'IF NOT EXISTS ' : '',
            $schema->table(),
            implode(', ', $definitions)
        );
    }

    private function dropTable(DropTable $command): string
    {
        return 'DROP TABLE IF EXISTS ' . $command->table();
    }

    private function renameTable(RenameTable $command): string
    {
        return sprintf(
            'RENAME TABLE %s TO %s',
            $command->from(),
            $command->to()
        );
    }

    /* =========================
     * COLUMNS
     * ========================= */

    private function addColumn(AddColumn $command): string
    {
        return sprintf(
            'ALTER TABLE %s ADD COLUMN %s',
            $command->table(),
            $this->column($command->column())
        );
    }

    private function addColumnAfter(AddColumnAfter $command): string
    {
        return sprintf(
            'ALTER TABLE %s ADD COLUMN %s AFTER %s',
            $command->table(),
            $this->column($command->column()),
            $command->after()
        );
    }

    private function modifyColumn(ModifyColumn $command): string
    {
        return sprintf(
            'ALTER TABLE %s MODIFY COLUMN %s',
            $command->table(),
            $this->column($command->column())
        );
    }

    private function dropColumn(DropColumn $command): string
    {
        return sprintf(
            'ALTER TABLE %s DROP COLUMN %s',
            $command->table(),
            $command->column()
        );
    }

    /* =========================
     * CONSTRAINTS
     * ========================= */

    private function addPrimaryKey(AddPrimaryKey $command): string
    {
        return sprintf(
            'ALTER TABLE %s ADD PRIMARY KEY (%s)',
            $command->table(),
            $command->column()
        );
    }

    private function addUnique(AddUnique $command): string
    {
        return sprintf(
            'ALTER TABLE %s ADD UNIQUE (%s)',
            $command->table(),
            $command->column()
        );
    }

    private function addForeignKey(AddForeignKey $command): string
    {
        $constraintName = sprintf(
            'fk_%s_%s',
            $command->table(),
            $command->column()
        );

        return sprintf(
            'ALTER TABLE %s ADD CONSTRAINT %s FOREIGN KEY (%s) REFERENCES %s(%s)',
            $command->table(),
            $constraintName,
            $command->column(),
            $command->referenceTable(),
            $command->referenceColumn()
        );
    }

    private function dropConstraint(DropConstraint $command): string
    {
        return sprintf(
            'ALTER TABLE %s DROP FOREIGN KEY %s',
            $command->table(),
            $command->constraint()
        );
    }

    /* =========================
     * HELPERS
     * ========================= */

    private function column(Column $column): string
    {
        $sql = $column->name() . ' ' . match ($column->type()) {
            'int'     => 'INT',
            'varchar'=> 'VARCHAR(255)',
            default   => throw new RuntimeException(
                'Tipo de columna no soportado: ' . $column->type()
            )
        };

        if (!$column->isNullable()) {
            $sql .= ' NOT NULL';
        }

        if ($column->isAutoIncrement()) {
            $sql .= ' AUTO_INCREMENT';
        }

        return $sql;
    }

    private function constraint(Constraint $constraint): string
    {
        return match (true) {
            $constraint instanceof PrimaryKey =>
                'PRIMARY KEY (' . $constraint->column() . ')',

            default =>
                throw new RuntimeException(
                    'Constraint no soportado: ' . $constraint::class
                )
        };
    }
}
