<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\audit\listener;

//use bisae\kernel\core\audit\event\DbChangeEvent;
//use bisae\kernel\core\db\DatabaseDriver;

//require "DbChangeEvent.php";
//require "DatabaseDriver.php";

final class AuditDbChangeListener
{
    public function __construct(
		 private AuditLogger $logger
    ) {}
	
	
	
	
	
	public function __invoke(DbChangeEvent $event): void
    {
        $auditContext = $event->auditContext;

        foreach ($auditContext->drivers() as $driver) {
            $this->persistAudit($driver, $event);
        }
    }

   /* private function persistAudit(DatabaseDriver $driver, DbChangeEvent $event): void
    {
        // aquí construyes SQL y ejecutas
        $driver->query($sql);
    }*/
	
	
	
	
	
	
	
	
	
	
	
	

    public function persistAudit(DatabaseDriver $driver, DbChangeEvent $event): void
    {
        //if ($event->affectedRows === 0) {
            //return;
       // }

        // 1. Obtener estado previo si no vino
        ///$before = $event->before ?? $this->fetchBefore($event);

        // 2. Obtener estado posterior
        //$after  = $event->after  ?? $this->fetchAfter($event);

        // 3. Calcular cambios
        $changed = $this->diff($event->before ?? [], $event->after ?? []);
		
		$operacion=$event->operation;
		
		$before_local=$event->before;
		$after_local=$event->after;
		
		if($operacion==="INSERT"){
			$before_local=[];
		}else if($operacion==="DELETE"){
			$after_local=[];
		}else if($operacion==="UPDATE"){
			$before_local=[];
			$after_local=[];
		}
		

        // 4. Construir payload de auditoría
        $payload = [
            'before' => $before_local,
            'after'  => $after_local,
            'changed_fields' => $changed,
            'where' => $event->where
        ];
		
		//4.1 Crear previus hash
		$previousHash = null;
		
		//$sql_executor=new SelectExecutor(); //TEMPORAL

		$result = $driver->query(
			"SELECT hash FROM s_audit ORDER BY sid DESC LIMIT 1"
		);

		
		if (!$result->isSuccess()) {
			throw new RuntimeException($result->error);
		}

		$previousHash = $result->rows[0]['hash'] ?? null;
		//
		$auditData = [
			'operation'      => $event->operation,
			'database'       => $event->database,
			'table_name'     => $event->table,
			'actor_id'       => $event->actorId,
			'affected_rows'  => $event->affectedRows,
			'payload'        => $payload,
			'correlation_id' => $event->correlationId,
			'created_at'     => $event->occurredAt->format('Y-m-d H:i:s'),
		];
		
		//
		$hash = AuditHashGenerator::generate(
			data: $auditData,
			previousHash: $previousHash
		);



        // 5. Guardar auditoría
        $sql = "
			INSERT INTO s_audit
			(
				correlation_id,
				operation,
				database_name,
				table_name,
				actor_id,
				affectedRows,
				payload,
				created_at,
				ip,
				userAgent,
				previous_hash,
				hash
			)
			VALUES
			(
				'{$event->correlationId}',
				'{$event->operation}',
				'{$event->database}',
				'{$event->table}',
				".($event->actorId ?? 'NULL').",
				{$event->affectedRows},
				'".json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)."',
				'{$event->occurredAt->format('Y-m-d H:i:s')}',
				'{$event->ip}',
				'{$event->userAgent}',
				".($previousHash ? "'$previousHash'" : "NULL").",
				'$hash'
			)
		";

        $driver->query($sql);
    }

    private function fetchBefore(DbChangeEvent $event): array
    {
        $where = $this->buildWhere($event->where);
        $sql = "SELECT * FROM {$event->table} WHERE {$where}";
        $r = $this->driver->query($sql);
        return $r->rows[0] ?? [];
    }

    private function fetchAfter(DbChangeEvent $event): array
    {
        $where = $this->buildWhere($event->where);
        $sql = "SELECT * FROM {$event->table} WHERE {$where}";
        $r = $this->driver->query($sql);
        return $r->rows[0] ?? [];
    }

    private function buildWhere(array $where): string
    {
        return implode(' AND ', array_map(
            fn($k, $v) => "$k = '$v'",
            array_keys($where),
            $where
        ));
    }

    private function diff(array $before, array $after): array
    {
        $changes = [];
        foreach ($after as $k => $v) {
            if (($before[$k] ?? null) !== $v) {
                $changes[$k] = [
                    'from' => $before[$k] ?? null,
                    'to'   => $v
                ];
            }
        }
        return $changes;
    }
}
=======
<?php
//namespace bisae\kernel\core\audit\listener;

//use bisae\kernel\core\audit\event\DbChangeEvent;
//use bisae\kernel\core\db\DatabaseDriver;

//require "DbChangeEvent.php";
//require "DatabaseDriver.php";

final class AuditDbChangeListener
{
    public function __construct(
		 private AuditLogger $logger
    ) {}
	
	
	
	
	
	public function __invoke(DbChangeEvent $event): void
    {
        $auditContext = $event->auditContext;

        foreach ($auditContext->drivers() as $driver) {
            $this->persistAudit($driver, $event);
        }
    }

   /* private function persistAudit(DatabaseDriver $driver, DbChangeEvent $event): void
    {
        // aquí construyes SQL y ejecutas
        $driver->query($sql);
    }*/
	
	
	
	
	
	
	
	
	
	
	
	

    public function persistAudit(DatabaseDriver $driver, DbChangeEvent $event): void
    {
        //if ($event->affectedRows === 0) {
            //return;
       // }

        // 1. Obtener estado previo si no vino
        ///$before = $event->before ?? $this->fetchBefore($event);

        // 2. Obtener estado posterior
        //$after  = $event->after  ?? $this->fetchAfter($event);

        // 3. Calcular cambios
        $changed = $this->diff($event->before ?? [], $event->after ?? []);
		
		$operacion=$event->operation;
		
		$before_local=$event->before;
		$after_local=$event->after;
		
		if($operacion==="INSERT"){
			$before_local=[];
		}else if($operacion==="DELETE"){
			$after_local=[];
		}else if($operacion==="UPDATE"){
			$before_local=[];
			$after_local=[];
		}
		

        // 4. Construir payload de auditoría
        $payload = [
            'before' => $before_local,
            'after'  => $after_local,
            'changed_fields' => $changed,
            'where' => $event->where
        ];
		
		//4.1 Crear previus hash
		$previousHash = null;
		
		//$sql_executor=new SelectExecutor(); //TEMPORAL

		$result = $driver->query(
			"SELECT hash FROM s_audit ORDER BY sid DESC LIMIT 1"
		);

		
		if (!$result->isSuccess()) {
			throw new RuntimeException($result->error);
		}

		$previousHash = $result->rows[0]['hash'] ?? null;
		//
		$auditData = [
			'operation'      => $event->operation,
			'database'       => $event->database,
			'table_name'     => $event->table,
			'actor_id'       => $event->actorId,
			'affected_rows'  => $event->affectedRows,
			'payload'        => $payload,
			'correlation_id' => $event->correlationId,
			'created_at'     => $event->occurredAt->format('Y-m-d H:i:s'),
		];
		
		//
		$hash = AuditHashGenerator::generate(
			data: $auditData,
			previousHash: $previousHash
		);



        // 5. Guardar auditoría
        $sql = "
			INSERT INTO s_audit
			(
				correlation_id,
				operation,
				database_name,
				table_name,
				actor_id,
				affectedRows,
				payload,
				created_at,
				ip,
				userAgent,
				previous_hash,
				hash
			)
			VALUES
			(
				'{$event->correlationId}',
				'{$event->operation}',
				'{$event->database}',
				'{$event->table}',
				".($event->actorId ?? 'NULL').",
				{$event->affectedRows},
				'".json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)."',
				'{$event->occurredAt->format('Y-m-d H:i:s')}',
				'{$event->ip}',
				'{$event->userAgent}',
				".($previousHash ? "'$previousHash'" : "NULL").",
				'$hash'
			)
		";

        $driver->query($sql);
    }

    private function fetchBefore(DbChangeEvent $event): array
    {
        $where = $this->buildWhere($event->where);
        $sql = "SELECT * FROM {$event->table} WHERE {$where}";
        $r = $this->driver->query($sql);
        return $r->rows[0] ?? [];
    }

    private function fetchAfter(DbChangeEvent $event): array
    {
        $where = $this->buildWhere($event->where);
        $sql = "SELECT * FROM {$event->table} WHERE {$where}";
        $r = $this->driver->query($sql);
        return $r->rows[0] ?? [];
    }

    private function buildWhere(array $where): string
    {
        return implode(' AND ', array_map(
            fn($k, $v) => "$k = '$v'",
            array_keys($where),
            $where
        ));
    }

    private function diff(array $before, array $after): array
    {
        $changes = [];
        foreach ($after as $k => $v) {
            if (($before[$k] ?? null) !== $v) {
                $changes[$k] = [
                    'from' => $before[$k] ?? null,
                    'to'   => $v
                ];
            }
        }
        return $changes;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
