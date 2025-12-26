<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\db\driver;

//require "DatabaseConfig.php";


//use mysqli;
//use RuntimeException;
//use bisae\kernel\core\db\DatabaseConfig;
//use bisae\kernel\core\db\DatabaseDriver;
//use bisae\kernel\core\db\result\QueryResult;

final class MySQLDriver implements DatabaseDriver
{
    private ?mysqli $conn = null;
    private ?DatabaseConfig $context = null;

    public function connect(DatabaseConfig $context): void
    {echo "INTENTO 1";
        if ($this->conn !== null && $this->conn->ping() && 
            $this->context?->database === $context->database) {
            return;
        }
echo "INTENTO 2";
        $this->disconnect();

        $this->conn = new \mysqli(
            $context->host,
            $context->user,
            $context->password,
            $context->database,
            $context->port
        );

        if ($this->conn->connect_errno) {
            throw new \RuntimeException(
                "DB connection error: {$context->database}"
            );
        }

        $this->context = $context;
    }
	
	public function reconnect(): void
    {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }

        if ($this->context) {
            $this->connect($this->context);
        }
    }
	
	public function flush(): void
    {
        if (!$this->conn) {
            return;
        }

        // Limpia resultados pendientes
        while ($this->conn->more_results()) {
            $this->conn->next_result();
            if ($result = $this->conn->store_result()) {
                $result->free();
            }
        }
    }

    public function disconnect(): void
    {
        if ($this->conn) {
            $this->conn->close();
        }
        $this->conn = null;
        $this->context = null;
    }

    public function currentDatabase(): ?string
    {
        return $this->context?->database;
    }
	
	public static function isWriteOperation(string $sql): bool
    {
        $sql = ltrim($sql);

        // extrae la primera palabra
        $command = strtoupper(strtok($sql, " \n\t"));

        return in_array($command, [
            'INSERT',
            'UPDATE',
            'DELETE',
            'REPLACE',
            'ALTER',
            'DROP',
            'CREATE',
            'TRUNCATE',
            'RENAME'
        ], true);
    }
	
    public function query(string $sql): QueryResult
    {
		
		
		//$this->connect($this->context);
        if (!$this->conn) {
            throw new RuntimeException('Database not connected');
        }
		
		if ($this->context->readOnly && $this->isWriteOperation($sql)) {
			throw new \LogicException("Write operation not allowed on read-only database");
		}
		
		//$this->driver->flush(); // o reconnect()
		echo "SQL: ".$sql;
        $result = $this->conn->query($sql);

        if ($result === false) {
            return new QueryResult(
                success: false,
                error: $this->conn->error
            );
        }

        if ($result instanceof \mysqli_result) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();

            return new QueryResult(
                success: true,
                rows: $rows
            );
        }

        return new QueryResult(
            success: true,
            affectedRows: $this->conn->affected_rows,
            insertId: $this->conn->insert_id ?: null
        );
    }

    public function begin(): void
    {
        $this->conn->begin_transaction();
    }

    public function commit(): void
    {
        $this->conn->commit();
    }

    public function rollback(): void
    {
        $this->conn->rollback();
    }

    public function lastInsertId(): int
    {
        return $this->conn->insert_id;
    }

    public function affectedRows(): int
    {
        return $this->conn->affected_rows;
    }
	
	
	 public function beginTransaction(): void
    {
	
		//$this->connect($context);
		
        
        $this->conn->begin_transaction();
    }

}
=======
<?php
//namespace bisae\kernel\core\db\driver;

//require "DatabaseConfig.php";


//use mysqli;
//use RuntimeException;
//use bisae\kernel\core\db\DatabaseConfig;
//use bisae\kernel\core\db\DatabaseDriver;
//use bisae\kernel\core\db\result\QueryResult;

final class MySQLDriver implements DatabaseDriver
{
    private ?mysqli $conn = null;
    private ?DatabaseConfig $context = null;

    public function connect(DatabaseConfig $context): void
    {echo "INTENTO 1";
        if ($this->conn !== null && $this->conn->ping() && 
            $this->context?->database === $context->database) {
            return;
        }
echo "INTENTO 2";
        $this->disconnect();

        $this->conn = new \mysqli(
            $context->host,
            $context->user,
            $context->password,
            $context->database,
            $context->port
        );

        if ($this->conn->connect_errno) {
            throw new \RuntimeException(
                "DB connection error: {$context->database}"
            );
        }

        $this->context = $context;
    }
	
	public function reconnect(): void
    {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }

        if ($this->context) {
            $this->connect($this->context);
        }
    }
	
	public function flush(): void
    {
        if (!$this->conn) {
            return;
        }

        // Limpia resultados pendientes
        while ($this->conn->more_results()) {
            $this->conn->next_result();
            if ($result = $this->conn->store_result()) {
                $result->free();
            }
        }
    }

    public function disconnect(): void
    {
        if ($this->conn) {
            $this->conn->close();
        }
        $this->conn = null;
        $this->context = null;
    }

    public function currentDatabase(): ?string
    {
        return $this->context?->database;
    }
	
	public static function isWriteOperation(string $sql): bool
    {
        $sql = ltrim($sql);

        // extrae la primera palabra
        $command = strtoupper(strtok($sql, " \n\t"));

        return in_array($command, [
            'INSERT',
            'UPDATE',
            'DELETE',
            'REPLACE',
            'ALTER',
            'DROP',
            'CREATE',
            'TRUNCATE',
            'RENAME'
        ], true);
    }
	
    public function query(string $sql): QueryResult
    {
		
		
		//$this->connect($this->context);
        if (!$this->conn) {
            throw new RuntimeException('Database not connected');
        }
		
		if ($this->context->readOnly && $this->isWriteOperation($sql)) {
			throw new \LogicException("Write operation not allowed on read-only database");
		}
		
		//$this->driver->flush(); // o reconnect()
		echo "SQL: ".$sql;
        $result = $this->conn->query($sql);

        if ($result === false) {
            return new QueryResult(
                success: false,
                error: $this->conn->error
            );
        }

        if ($result instanceof \mysqli_result) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();

            return new QueryResult(
                success: true,
                rows: $rows
            );
        }

        return new QueryResult(
            success: true,
            affectedRows: $this->conn->affected_rows,
            insertId: $this->conn->insert_id ?: null
        );
    }

    public function begin(): void
    {
        $this->conn->begin_transaction();
    }

    public function commit(): void
    {
        $this->conn->commit();
    }

    public function rollback(): void
    {
        $this->conn->rollback();
    }

    public function lastInsertId(): int
    {
        return $this->conn->insert_id;
    }

    public function affectedRows(): int
    {
        return $this->conn->affected_rows;
    }
	
	
	 public function beginTransaction(): void
    {
	
		//$this->connect($context);
		
        
        $this->conn->begin_transaction();
    }

}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
