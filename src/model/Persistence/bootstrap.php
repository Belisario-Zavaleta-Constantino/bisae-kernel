<?php

$dispatcher = new EventDispatcher();

$auditListener = new AuditDbChangeListener($driver);

$dispatcher->listen(
    \bisae\kernel\core\audit\event\DbChangeEvent::class,
    $auditListener
);

$commands = new CommandExecutor($driver, $dispatcher);
