<?php




require 'Database/DatabaseConfig.php';
require "Database/DatabaseDriver.php";
require 'Database/Driver/MySQLDriver.php';

require "Database/QueryResult.php";
require "Event/DbChangeEvent.php";

$config = new DatabaseConfig(
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test',
    readOnly: false
);


$config2 = new DatabaseConfig(
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test_2',
    readOnly: false
);

$db = new MySQLDriver();
$db2 = new MySQLDriver();

$db->connect($config);
$db2->connect($config2 );




require "Event/EventDispatcher.php";
require "Audit/AuditDbChangeListener.php";
require "Command/CommandExecutor.php";
require "Command/UpsertCommand.php";
require "Command/UpsertResult.php";
require "ValueObject/CorrelationId.php";
require "ValueObject/ContextGuard.php";
require "Audit/AuditHashGenerator.php";
require "Audit/AuditContext.php";
require "Audit/AuditContextHolder.php";
require "Audit/AuditLogger.php";

require "Database/TransactionCommand.php";
require "Database/TransactionContext.php";
require "Database/TransactionResult.php";
require "Database/TransactionRunner.php";
require "Command/InsertCommand.php";

require "Database/Driver/DatabaseManager.php";


AuditContextHolder::set(
new AuditContext([
    $db,
    $db2
])
);


//NO PERMITIDA
/*$result = $db->query("SELECT * FROM prueba");

if ($result->isSuccess()) {
    foreach ($result->rows as $row) {
        // BISAE feliz 🧠
		//print_r($row);
		echo "Nombre: ".$row["nombre"]."</br>";
		echo "Paterno: ".$row["paterno"]."</br>";
		echo "Materno: ".$row["materno"]."</br>";
    }
}*/



require "Query/SelectExecutor.php";

$executor = new SelectExecutor($db);

$sql_1 = 'SELECT
  *         
FROM prueba'; // con alias tabla.columna
$arr_1 = $executor->select($sql_1);

print_r($arr_1);

echo "<br/>";
echo "<br/>";

//SIEMPRE Y CUANDO HAYA ALIAS
for ($i = 0; $i < count($arr_1->rows); $i++) {
	

   // echo $prueba_nombre  = $arr_1[$i]["prueba.nombre"];
  //  echo $prueba_paterno = $arr_1[$i]["prueba.paterno"];
  //  echo $prueba_materno = $arr_1[$i]["prueba.materno"];
   

    
}











$correlationId = CorrelationId::generate();


$auditLogger = new AuditLogger();
$dispatcher  = new EventDispatcher();

$auditListener = new AuditDbChangeListener($auditLogger);

/*$dispatcher->listen(
    DbChangeEvent::class,
    [$auditListener, 'handle']
);*/



echo "quesito2";
		var_dump($dispatcher);
		
		echo "<br/>";
		echo "<br/>";

$dispatcher->listen(
    DbChangeEvent::class,
    $auditListener
);

$commands = new CommandExecutor($db, $dispatcher);

$affected = $commands->update(
    //context: $config,
    table: 'prueba',
    data: ['id' => 43, 'nombre' => "nombre_2", 'paterno' => "paterno_2", 'materno' => "materno_2"],
    where: ['id' => 1],
    actorId: 2,
    correlationId: $correlationId
);


try {
	
	$before = $commands->fetchBefore('prueba', ['id' => 42]);
	
    $affected = $commands->delete(
		//database: $config,
		table: 'prueba',
		sql: 'Delete from prueba WHERE id = 42',
		where: ['id' => 42],
		actorId: 2,
		correlationId: $correlationId
	);
	
	
	echo "quesito";
		var_dump($dispatcher);
		
		echo "<br/>";
		echo "<br/>";
	// Emitir evento (UNA sola vez)
$dispatcher->dispatch(
    new DbChangeEvent(
        operation: 'DELETE',
        database: 'test',
        table: 'prueba',
        where:  ['id' => 42],
        affectedRows: 1,
        correlationId: $correlationId,
        occurredAt: new DateTimeImmutable(),
        actorId: 2,
		before: $before,
		after: [] 
    )
);


$dispatcher->dispatch(
    new DbChangeEvent(
        operation: 'DELETE',
        database: 'test_2',
        table: 'prueba',
        where:  ['id' => 42],
        affectedRows: 1,
        correlationId: $correlationId,
        occurredAt: new DateTimeImmutable(),
        actorId: 2,
		before: $before,
		after: [] 
    )
);






/*
$affected = $commands->insert(
    //context: $config,
    table: 'prueba',
    data: ['id' => 42, 'nombre' => "nombre_2", 'paterno' => "paterno_2", 'materno' => "materno_2"],
    actorId: 2,
    correlationId: $correlationId
);*/









$upsertCommand   = new UpsertCommand($db, $dispatcher);

$result = $upsertCommand->upsert(
    //database: $config,
    table: 'prueba',
    key: ['id' => 26],
    data: [
        'id' => '26',
        'nombre' => 'Mario',
        'paterno' => 'Naranja',
        'materno' => date("Y-m-d H:i:s")
    ],
    actorId: 3,
    correlationId: $correlationId
);

if ($result->operation === 'INSERT') {
    // nuevo registro
	echo "SE INSERTO";
}else{
	echo "SE ACTUALIZO";
}




$result = $upsertCommand->upsert(
   // database: $config,
    table: 'prueba',
    key: ['id' => 18],
    data: [
        'id' => '18',
        'nombre' => 'Pablo',
        'paterno' => 'Limon',
        'materno' => "1234"
    ],
    actorId: 3,
    correlationId: $correlationId
);

if ($result->operation === 'INSERT') {
    // nuevo registro
	echo "SE INSERTO";
}else{
	echo "SE ACTUALIZO";
}








 $guard = new ContextGuard;
 $guard->expect('test_2');
 $guard->validate($config2);
 
/*$result = $upsertCommand->upsert(
    //database: $config2,
    table: 'prueba',
    key: ['id' => 32],
    data: [
        'id' => '32',
        'nombre' => 'Mario',
        'paterno' => 'Naranja',
        'materno' => date("Y-m-d H:i:s")
    ],
    actorId: 3,
    correlationId: $correlationId
);

if ($result->operation === 'INSERT') {
    // nuevo registro
	echo "SE INSERTO 2";
}else{
	echo "SE ACTUALIZO 2";
}*/







$commands2 = [
    new InsertCommand('prueba', [
        'nombre' => 'Jacinto',
        'paterno' => 'Castaneda',
    ]),

    new InsertCommand('prueba', [
        'nombre' => 'Pablito',
        'paterno' => 'Escobar',
    ]),
];

$runner = new TransactionRunner($db, $commands);
$result = $runner->run($commands2);

print_r($result);












echo "<BR/><BR/><BR/><BR/><BR/>FINAL<BR/><BR/><BR/><BR/><BR/>";



$db = new DatabaseManager($commands, $executor, $upsertCommand, $runner);

//$sql1='Insert into prueba(nombre) values("Salsa")';
$sql2='Select * from prueba';
//$sql3='Update prueba set nombre="Xuri" where id=8';
$sql4='Delete from prueba where id=9';

$db->insert("prueba",["nombre"=>"ihjoasijjjjcposcFFFFspakjc"],7,$correlationId);
$db->select($sql2);
$db->transaction([
    $db->update("prueba",["nombre"=>"betpojgwejgpep"],["id"=>18],7,$correlationId),
    $db->delete("prueba",$sql4,["id"=>18],7,$correlationId),
]);







} finally {
    AuditContextHolder::clear();
}


