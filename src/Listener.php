<?php

namespace Esoastor\EventManager;

interface Listener
{
    public function handle(object $event): void;
}