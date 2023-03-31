<?php

namespace Esoastor\EventManager;

class ListenerProvider
{
    public const STRICT = true;
    public const LOOSE = false;

    private bool $useStrictEventNames = false;
    private array $listeners = [];
    
    public function __construct(private array $eventNames = [])
    {
    }

    public function addListeners(string $eventName, array $listeners): void
    {
        if ($this->useStrictEventNames && !isset($this->eventNames[$eventName])) {
            throw new Errors\NoEventNames();
        }

        $this->listeners[$eventName] = array_merge($this->listeners[$eventName], $listeners);
    }

    public function getListenersForEvent(string $eventName): iterable
    {
        if ($this->useStrictEventNames && !isset($this->eventNames[$eventName])) {
            throw new Errors\NoEventNames();
        }
        return isset($this->listeners[$eventName]) ? $this->listeners[$eventName] : [];
    }

    public function setEventNamesMode(bool $mode): void
    {
        $this->useStrictEventNames = $mode;
    }

    public function addEventNames(array $eventNames): void
    {
        $this->eventNames = array_merge($this->eventNames, $eventNames);
    }
}