<?php
//namespace bisae\kernel\core\db\executor;

//use bisae\kernel\core\db\DatabaseDriver;
//use bisae\kernel\core\event\EventDispatcher;
//use bisae\kernel\core\audit\event\DbChangeEvent;


//require "DatabaseDriver.php";
//require "EventDispatcher.php";



final class CommandExecutor
{
    public function __construct(
        private DatabaseDriver $driver,
        private EventDispatcher $dispatcher
    ) {}
	//nueva
	public function update(
   // DatabaseConfig $context,
    string $table,
    array $data,
    array $where,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult {
    $correlationId ??= CorrelationId::generate();

   // $this->driver->connect($context);

    // 1️⃣ BEFORE
    $before = $this->fetchBefore($table, $where);

    // 2️⃣ UPDATE
    $sql = $this->buildUpdate($table, $data, $where);
    $result = $this->driver->query($sql);

    if (!$result->success) {
        throw new \RuntimeException($result->error);
    }

    // 3️⃣ AFTER
    $after = array_merge($before, $data);

    // 4️⃣ Auditoría
    $this->dispatcher->dispatch(
        new DbChangeEvent(
            operation: 'UPDATE',
            table: $table,
            where: $where,
            affectedRows: $result->affectedRows,
            //database: $context->database,
            database: $this->driver->currentDatabase(),
            correlationId: $correlationId,
            before: [],
            after: [],
            actorId: $actorId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null,
        )
    );

  //  return $result->affectedRows;
	
	return new QueryResult(
		success: true,
		affectedRows: $result->affectedRows,
	   // insertId: $this->conn->insert_id ?: null
	);
	
}

   
	public function insert(
    //DatabaseConfig $context,
    string $table,
    array $data,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult {
    $correlationId ??= CorrelationId::generate();

    // 1️⃣ Conectar explícitamente
   // $this->driver->connect($context);

    // 2️⃣ Construir SQL
    $sql = $this->buildInsert($table, $data);

    // 3️⃣ Ejecutar
    $result = $this->driver->query($sql);

    if (!$result->success) {
        throw new \RuntimeException($result->error);
    }

    // 4️⃣ Auditoría
    $this->dispatcher->dispatch(
        new DbChangeEvent(
            operation: 'INSERT',
            table: $table,
            where: ['sid' => $result->insertId],
            affectedRows: 1,
            //database: $context->database,
            database: $this->driver->currentDatabase(),
            correlationId: $correlationId,
            before: [],
            after: $data,
            actorId: $actorId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
        )
    );
   // return $this->driver->lastInsertId();
	
	return new QueryResult(
		success: true,
		affectedRows: $result->affectedRows,
	    insertId: $this->driver->lastInsertId() ?: null
	);
}
	

   /* public function delete(
        string $table,
        string $sql,
        array $where,
        ?int $actorId = null
    ): int {
        $result = $this->driver->query($sql);

        if (!$result->success) {
            throw new \RuntimeException($result->error);
        }

        $this->dispatcher->dispatch(
            new DbChangeEvent(
                operation: 'DELETE',
                table: $table,
                where: $where,
                affectedRows: $result->affectedRows,
                actorId: $actorId
            )
        );

        return $result->affectedRows;
    }*/
	
	public function delete(
    //DatabaseConfig $database,
    string $table,
    string $sql,
    array $where,
    ?int $actorId = null,
    ?string $correlationId = null
): QueryResult {
   
	$correlationId ??= CorrelationId::generate();

   // $this->driver->connect($database);
	
	// 1️⃣ Capturar BEFORE
    $before = $this->fetchBefore($table, $where);

	// 2️⃣ Ejecutar DELETE
    $result = $this->driver->query($sql);

    if (!$result->success) {
        throw new \RuntimeException($result->error);
    }

	// 3️⃣ Emitir evento con BEFORE incluido
    $this->dispatcher->dispatch(
        new DbChangeEvent(
            operation: 'DELETE',
            table: $table,
            where: $where,
            affectedRows: $result->affectedRows,
			database: $this->driver->currentDatabase(),
            //database: $database->database,
            correlationId: $correlationId,
            after: [],
            before: $before,
            actorId: $actorId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
        )
    );

   // return $result->affectedRows;
	
	return new QueryResult(
		success: true,
		affectedRows: $result->affectedRows,
	    //insertId: $this->driver->lastInsertId() ?: null
	);
	
	
	
}




public function fetchBefore(string $table, array $where): array
{
    $conditions = implode(' AND ', array_map(
        fn($k, $v) => "$k = '$v'",
        array_keys($where),
        $where
    ));

    $sql = "SELECT * FROM {$table} WHERE {$conditions}";
    $result = $this->driver->query($sql);

    return $result->rows ?? [];
}





private function buildInsert(string $table, array $data): string
    {
        $cols = implode(',', array_keys($data));
        $vals = implode(',', array_map(fn($v) => "'$v'", $data));
        return "INSERT INTO {$table} ({$cols}) VALUES ({$vals})";
    }

    private function buildUpdate(string $table, array $data, array $key): string
    {
        $set = implode(',', array_map(
            fn($k, $v) => "$k='$v'",
            array_keys($data),
            $data
        ));

        return "UPDATE {$table} SET {$set} WHERE ".$this->buildWhere($key);
    }

    private function buildWhere(array $where): string
    {
        return implode(' AND ', array_map(
		
            fn($k, $v) => "$k='$v'",
           // fn($k, $v) => "$k='".$this->driver->escape($v)."'",
			
            array_keys($where),
            $where
        ));
    }








}
