<<<<<<< HEAD
<?php

$dispatcher = new EventDispatcher();

$auditListener = new AuditDbChangeListener($driver);

$dispatcher->listen(
    \bisae\kernel\core\audit\event\DbChangeEvent::class,
    $auditListener
);

$commands = new CommandExecutor($driver, $dispatcher);
=======
<?php

$dispatcher = new EventDispatcher();

$auditListener = new AuditDbChangeListener($driver);

$dispatcher->listen(
    \bisae\kernel\core\audit\event\DbChangeEvent::class,
    $auditListener
);

$commands = new CommandExecutor($driver, $dispatcher);
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
