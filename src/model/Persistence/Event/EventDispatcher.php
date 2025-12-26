<<<<<<< HEAD
<?php
//namespace bisae\kernel\core\event;

final class EventDispatcher
{
    private array $listeners = [];

    public function listen(string $event, callable $listener): void
    {
        $this->listeners[$event][] = $listener;
    }

    public function dispatch(object $event): void
    {
		
		
        $eventName = $event::class;

        foreach ($this->listeners[$eventName] ?? [] as $listener) {
            $listener($event);
        }
		

    }
}
=======
<?php
//namespace bisae\kernel\core\event;

final class EventDispatcher
{
    private array $listeners = [];

    public function listen(string $event, callable $listener): void
    {
        $this->listeners[$event][] = $listener;
    }

    public function dispatch(object $event): void
    {
		
		
        $eventName = $event::class;

        foreach ($this->listeners[$eventName] ?? [] as $listener) {
            $listener($event);
        }
		

    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
