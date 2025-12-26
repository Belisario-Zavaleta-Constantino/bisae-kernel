<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\db\executor;

//use bisae\kernel\core\db\DatabaseDriver;
//use RuntimeException;

//require 

final class SelectExecutor
{
    public function __construct(
        private DatabaseDriver $driver
    ) {}

    /**
     * Ejecuta un SELECT y devuelve:
     * [
     *   [ "tabla.columna" => valor, ... ],
     *   ...
     * ]
     */
	 //nueva
	 public function select(
		//DatabaseConfig $context,
		string $sql
	): QueryResult {
		// 1️⃣ Conectar explícitamente
		//$this->driver->connect($context);

		// 2️⃣ Ejecutar
		$result = $this->driver->query($sql);

		if (!$result->success) {
			throw new \RuntimeException($result->error);
		}

		 $rows = [];

        foreach ($result->rows as $rowIndex => $row) {
            foreach ($row as $key => $value) {
                // Si viene como tabla.columna ya lo respetamos
                if (str_contains($key, '.')) {
                    $rows[$rowIndex][$key] = $value ?? '';
                } else {
                    // fallback por si el driver devuelve solo columna
                    $rows[$rowIndex][$key] = $value ?? '';
                }
            }
        }

       // return $rows;
		
		return new QueryResult(
			success: true,
			rows: $rows,
			//insertId: $this->driver->lastInsertId() ?: null
		);
	
		
		
	}
    
}
=======
<?php
//namespace bisae\kernel\core\db\executor;

//use bisae\kernel\core\db\DatabaseDriver;
//use RuntimeException;

//require 

final class SelectExecutor
{
    public function __construct(
        private DatabaseDriver $driver
    ) {}

    /**
     * Ejecuta un SELECT y devuelve:
     * [
     *   [ "tabla.columna" => valor, ... ],
     *   ...
     * ]
     */
	 //nueva
	 public function select(
		//DatabaseConfig $context,
		string $sql
	): QueryResult {
		// 1️⃣ Conectar explícitamente
		//$this->driver->connect($context);

		// 2️⃣ Ejecutar
		$result = $this->driver->query($sql);

		if (!$result->success) {
			throw new \RuntimeException($result->error);
		}

		 $rows = [];

        foreach ($result->rows as $rowIndex => $row) {
            foreach ($row as $key => $value) {
                // Si viene como tabla.columna ya lo respetamos
                if (str_contains($key, '.')) {
                    $rows[$rowIndex][$key] = $value ?? '';
                } else {
                    // fallback por si el driver devuelve solo columna
                    $rows[$rowIndex][$key] = $value ?? '';
                }
            }
        }

       // return $rows;
		
		return new QueryResult(
			success: true,
			rows: $rows,
			//insertId: $this->driver->lastInsertId() ?: null
		);
	
		
		
	}
    
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
