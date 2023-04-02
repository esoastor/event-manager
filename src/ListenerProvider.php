<?php

namespace Esoastor\EventManager;

class ListenerProvider
{
    public const STRICT = true;
    public const LOOSE = false;

    private bool $useStrictEventTypes = false;
    private array $listeners = [];
    
    public function __construct(private array $eventTypes = [])
    {
    }

    public function addListeners(string $eventName, array $listeners): void
    {
        if ($this->useStrictEventTypes && !isset($this->eventTypes[$eventName])) {
            throw new Errors\NoEventTypes();
        }

        $this->listeners[$eventName] = array_merge($this->listeners[$eventName] ?? [], $listeners);
    }

    public function getListenersForEvent(string $eventName): iterable
    {
        if ($this->useStrictEventTypes && !isset($this->eventTypes[$eventName])) {
            throw new Errors\NoEventTypes();
        }
        return isset($this->listeners[$eventName]) ? $this->listeners[$eventName] : [];
    }

    public function setEventTypesMode(bool $mode): void
    {
        $this->useStrictEventTypes = $mode;
    }

    public function addEventTypes(array $eventTypes): void
    {
        $this->eventTypes = array_merge($this->eventTypes, $eventTypes);
    }
}