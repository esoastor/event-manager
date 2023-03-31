<?php

namespace Esoastor\EventManager;

class EventDispatcher
{
    public function __construct(private ListenerProvider $listenerProvider)
    {
    }

    public static function get(): self
    {
        $provider = new ListenerProvider();
        $dispatcher = new self($provider);

        return $dispatcher;
    }

    public function addListeners(string $eventName, array $listeners): void
    {
        $this->listenerProvider->addListeners($eventName, $listeners);
    }

    public function addEventNames(array $eventNames): void
    {
        $this->listenerProvider->addEventNames($eventNames);
    }

    public function dispatch(string $eventName, object $event): void
    {
        $listeners = $this->listenerProvider->getListenersForEvent($eventName);
        foreach ($listeners as $listener)
        {
            $listener->handle($event);
        }
    }
}