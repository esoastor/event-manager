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