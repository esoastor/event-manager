<?php
namespace EventManager\Errors;

class NoEventNames extends \Exception
{
    public $message = 'Empty event names when used strict event type mode. Use only added event names or turn off strict mode';
}