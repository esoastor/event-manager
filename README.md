# Use #

create Listener (implements EventManager\Listener)
create Event (object of Event must be passed to listener)

create EventManager\EventDispatcher

```
# prebuilded
$dispatcher = EventDispatcher::get();

# with custom provider
$provider = new EventManager\ListenerProvider(['success', 'error']);
$dispatcher = new EventDispacher($provider);

# add listeners
$dispatcher->addListeners('success', [
    MyListeners\SendMail::class,
    MyListeners\AddInfoToDatabase::class
]);

....

$event = MyEvents\NewUserRegistered($userInfo);

$dispatcher->dispatch('success', $event);

```

## strict event names ##
If you wish to use only previosly declared events types, you can use *strict names mode*.
For this you must customise you listener provider before creating dispatcher with it

```
$provider = new EventManager\ListenerProvider(['success', 'error']);
$provider->setEventTypesMode(EventManager\ListenerProvider::STRICT);

$dispatcher = new EventDispacher($provider);

```
### adding more event names through $dispatcher ###
```
$dispatcher->addEventTypes(['start', 'finish]);
```
