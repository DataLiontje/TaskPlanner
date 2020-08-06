# TaskPlanner
**TaskPlanner Pocketmine Virion that lets you easily run tasks without creating a whole new TaskClass**

## Usage
First of all you have to register the plugin where you are using the virion on:

**Register Plugin**
```php
TaskPlanner::registerToPlugin(PluginBase);
```

**Delayed Task**

This example can run a function after 20 ticks.
```php
TaskPlanner::planTask(function ($task, $currentTick){

}, 20);
```


**Repeating Task**

This example can run a function every 20 ticks.
```php
TaskPlanner::planRepeatingTask(function ($task, $currentTick){

}, 20);
```

**Repeating Task**

This example can run a function every 20 ticks and waits 100 ticks before starting the first run.
```php
TaskPlanner::planRepeatingDelayTask(function ($task, $currentTick){

}, 20, 100);
```
