<<<<<<< HEAD
<?php
interface TransactionCommand
{
    public function execute(DatabaseDriver $driver, TransactionContext $context, CommandExecutor $executor): QueryResult;
}
=======
<?php
interface TransactionCommand
{
    public function execute(DatabaseDriver $driver, TransactionContext $context, CommandExecutor $executor): QueryResult;
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
