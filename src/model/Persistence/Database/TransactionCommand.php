<?php
interface TransactionCommand
{
    public function execute(DatabaseDriver $driver, TransactionContext $context, CommandExecutor $executor): QueryResult;
}
