<?php

namespace EventManager;

interface Listener
{
    public function handle(object $event): void;
}