<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\msql;

//use bisae\kernel\core\db\result\QueryResult;
interface DatabaseDriver
{
    public function connect(DatabaseConfig $config): void;
    public function disconnect(): void;

    public function query(string $sql): QueryResult;

    public function begin(): void;
    public function commit(): void;
    public function rollback(): void;

    public function lastInsertId(): int;
    public function affectedRows(): int;
	
	public static function isWriteOperation(string $sql): bool;
	
	
	public function flush(): void;
	public function reconnect(): void;
	
	
	 public function beginTransaction(): void;

    //public function insert(string $table, array $data): QueryResult;
    //public function update(string $table, array $data, array $where): QueryResult;
    //public function delete(string $table, array $where): QueryResult;
}



   

=======
<?php
//namespace bisae\kernel\core\msql;

//use bisae\kernel\core\db\result\QueryResult;
interface DatabaseDriver
{
    public function connect(DatabaseConfig $config): void;
    public function disconnect(): void;

    public function query(string $sql): QueryResult;

    public function begin(): void;
    public function commit(): void;
    public function rollback(): void;

    public function lastInsertId(): int;
    public function affectedRows(): int;
	
	public static function isWriteOperation(string $sql): bool;
	
	
	public function flush(): void;
	public function reconnect(): void;
	
	
	 public function beginTransaction(): void;

    //public function insert(string $table, array $data): QueryResult;
    //public function update(string $table, array $data, array $where): QueryResult;
    //public function delete(string $table, array $where): QueryResult;
}



   

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
