<?php
/*
final class TransactionRunner extends CommandExecutor
{
   
	public function __construct(
        private DatabaseDriver $driver,
        private EventDispatcher $dispatcher
    ) {}

    public function run(array $commands): TransactionResult
    {
        $context = new TransactionContext();
        $results = [];
		
		if (!method_exists($this->driver, 'beginTransaction')) {
			throw new LogicException('Driver no soporta transacciones');
		}

        $this->driver->beginTransaction();

        try {
            foreach ($commands as $i => $command) {
                $result = $command->execute($this->driver, $context);

                if (!$result->success) {
                    throw new RuntimeException($result->error ?? 'Error desconocido');
                }

                $context->addResult($i, $result);
                $results[] = $result;
            }

            $this->driver->commit();

            return TransactionResult::success($results);

        } catch (Throwable $e) {
            $this->driver->rollback();

            return TransactionResult::failure(
                $e->getMessage(),
                $results
            );
        }
    }
}*/



final class TransactionRunner
{
    public function __construct(
        private DatabaseDriver $driver,
        private CommandExecutor $executor
    ) {}

    public function run(array $commands): TransactionResult
    {
        $context = new TransactionContext();
        $results = [];

        $this->driver->beginTransaction();

        try {
            foreach ($commands as $i => $command) {
                $result = $command->execute(
                    $this->driver,
                    $context,
                    $this->executor
                );

                if (!$result->success) {
                    throw new RuntimeException($result->error);
                }

                $context->addResult($i, $result);
                $results[] = $result;
            }

            $this->driver->commit();
            return TransactionResult::success($results);

        } catch (Throwable $e) {
            $this->driver->rollback();
            return TransactionResult::failure($e->getMessage(), $results);
        }
    }
}
