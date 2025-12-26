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
