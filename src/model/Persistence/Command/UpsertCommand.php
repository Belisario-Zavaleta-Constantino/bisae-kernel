<<<<<<< HEAD
<?php

final class UpsertCommand
{
    public function __construct(
        private DatabaseDriver $driver,
        private EventDispatcher $dispatcher
    ) {}
 ///nueva
	public function upsert(
    //DatabaseConfig $database,
    string $table,
    array $key,
    array $data,
    ?int $actorId = null,
    ?string $correlationId = null
): UpsertResult {
    $correlationId ??= CorrelationId::generate();

   // $this->driver->connect($database);

     // 1️⃣ Detectar existencia (BEFORE)
    $before = $this->fetchExisting($table, $key);

    if ($before === null) {
        // INSERT
        /*$insertId = $this->insert(
            $database,
            $table,
            $data,
            $actorId,
            $correlationId
        );*/
		
		$sql = $this->buildInsert($table, $data);
            $result = $this->driver->query($sql);
			
			$insertId=$this->driver->lastInsertId();
		
		 if (!$result->success) {
                throw new \RuntimeException($result->error);
            }
			
			
			
			
			

            // 3️⃣ Evento INSERT
            $this->dispatcher->dispatch(
                new DbChangeEvent(
                    operation: 'INSERT',
                    //database: $database->database,
					database: $this->driver->currentDatabase(),
                    table: $table,
                    where: $key,
                    affectedRows: 1,
					before: null,
                    after: $data,
                    actorId: $actorId,
				correlationId: $correlationId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
                )
            );

            return new UpsertResult(
                operation: 'INSERT',
                affectedRows: 1,
                insertId: $insertId
            );

    }

    // UPDATE
   /* $affected = $this->update(
        $database,
        $table,
        $data,
        $key,
        $actorId,
        $correlationId
    );*/
	
	$sql = $this->buildUpdate($table, $data, $key);
        $result = $this->driver->query($sql);
		
		if (!$result->success) {
            throw new \RuntimeException($result->error);
        }
		
	

			if (empty($result->affectedRows)) {
				$this->dispatcher->dispatch(
					new DbChangeEvent(
						operation: 'NUPDATE',
						database: $this->driver->currentDatabase(),
						//database: $database->database,
						table: $table,
						where: $key,
						affectedRows: 0,
						before: [],
						after: [],
						actorId: $actorId,
						correlationId: $correlationId,
					ip: $_SERVER['REMOTE_ADDR'] ?? null,
					userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
					)
				);
				return new UpsertResult(
					operation: 'NUPDATE',
					affectedRows: 0
				);
			}
	
        

        // 5️⃣ AFTER
        //$after = array_merge($before, $data);
		$this->driver->flush();
		$after = $this->fetchExisting($table, $key);

        // 6️⃣ Evento UPDATE
        $this->dispatcher->dispatch(
            new DbChangeEvent(
                operation: 'UPDATE',
                //database: $database->database,
				database: $this->driver->currentDatabase(),
                table: $table,
                where: $key,
                affectedRows: $result->affectedRows,
                before: $before,
                after: $after,
                actorId: $actorId,
				correlationId: $correlationId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
            )
        );

        return new UpsertResult(
            operation: 'UPDATE',
            affectedRows: $result->affectedRows
        );

   // return new UpsertResult('UPDATE', $affected);
}
  
    private function fetchExisting(string $table, array $key): ?array
    {
        $where = $this->buildWhere($key);
        $sql = "SELECT * FROM {$table} WHERE {$where} LIMIT 1";
        $r = $this->driver->query($sql);

        return $r->rows[0] ?? null;
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
=======
<?php

final class UpsertCommand
{
    public function __construct(
        private DatabaseDriver $driver,
        private EventDispatcher $dispatcher
    ) {}
 ///nueva
	public function upsert(
    //DatabaseConfig $database,
    string $table,
    array $key,
    array $data,
    ?int $actorId = null,
    ?string $correlationId = null
): UpsertResult {
    $correlationId ??= CorrelationId::generate();

   // $this->driver->connect($database);

     // 1️⃣ Detectar existencia (BEFORE)
    $before = $this->fetchExisting($table, $key);

    if ($before === null) {
        // INSERT
        /*$insertId = $this->insert(
            $database,
            $table,
            $data,
            $actorId,
            $correlationId
        );*/
		
		$sql = $this->buildInsert($table, $data);
            $result = $this->driver->query($sql);
			
			$insertId=$this->driver->lastInsertId();
		
		 if (!$result->success) {
                throw new \RuntimeException($result->error);
            }
			
			
			
			
			

            // 3️⃣ Evento INSERT
            $this->dispatcher->dispatch(
                new DbChangeEvent(
                    operation: 'INSERT',
                    //database: $database->database,
					database: $this->driver->currentDatabase(),
                    table: $table,
                    where: $key,
                    affectedRows: 1,
					before: null,
                    after: $data,
                    actorId: $actorId,
				correlationId: $correlationId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
                )
            );

            return new UpsertResult(
                operation: 'INSERT',
                affectedRows: 1,
                insertId: $insertId
            );

    }

    // UPDATE
   /* $affected = $this->update(
        $database,
        $table,
        $data,
        $key,
        $actorId,
        $correlationId
    );*/
	
	$sql = $this->buildUpdate($table, $data, $key);
        $result = $this->driver->query($sql);
		
		if (!$result->success) {
            throw new \RuntimeException($result->error);
        }
		
	

			if (empty($result->affectedRows)) {
				$this->dispatcher->dispatch(
					new DbChangeEvent(
						operation: 'NUPDATE',
						database: $this->driver->currentDatabase(),
						//database: $database->database,
						table: $table,
						where: $key,
						affectedRows: 0,
						before: [],
						after: [],
						actorId: $actorId,
						correlationId: $correlationId,
					ip: $_SERVER['REMOTE_ADDR'] ?? null,
					userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
					)
				);
				return new UpsertResult(
					operation: 'NUPDATE',
					affectedRows: 0
				);
			}
	
        

        // 5️⃣ AFTER
        //$after = array_merge($before, $data);
		$this->driver->flush();
		$after = $this->fetchExisting($table, $key);

        // 6️⃣ Evento UPDATE
        $this->dispatcher->dispatch(
            new DbChangeEvent(
                operation: 'UPDATE',
                //database: $database->database,
				database: $this->driver->currentDatabase(),
                table: $table,
                where: $key,
                affectedRows: $result->affectedRows,
                before: $before,
                after: $after,
                actorId: $actorId,
				correlationId: $correlationId,
			ip: $_SERVER['REMOTE_ADDR'] ?? null,
            userAgent: $_SERVER['HTTP_USER_AGENT'] ?? null
            )
        );

        return new UpsertResult(
            operation: 'UPDATE',
            affectedRows: $result->affectedRows
        );

   // return new UpsertResult('UPDATE', $affected);
}
  
    private function fetchExisting(string $table, array $key): ?array
    {
        $where = $this->buildWhere($key);
        $sql = "SELECT * FROM {$table} WHERE {$where} LIMIT 1";
        $r = $this->driver->query($sql);

        return $r->rows[0] ?? null;
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
