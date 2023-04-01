<?php
namespace Esoastor\EventManager\Errors;

class NoEventTypes extends \Exception
{
    public $message = 'Empty event types when used strict event type mode. Use only added event names or turn off strict mode';
}