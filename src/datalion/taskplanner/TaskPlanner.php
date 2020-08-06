<?php


namespace DataLibs;


use pocketmine\plugin\PluginBase;


class TaskPlanner
{
    /** @var PluginBase | null */
    private static $plugin = null;


    public static function __callStatic($name, $arguments)
    {
        if($name === 'registerToPlugin') return;
        if(is_null(self::$plugin)) throw new \ErrorException("Must register plugin first with TaskPlanner::registerToPlugin(PluginBase)");
    }


    public static function registerToPlugin(PluginBase $plugin){
        self::$plugin = $plugin;
    }

    public static function planTask(\Closure $function, int $tickDelay){
        $task = new TaskPlannerTask($function);

        self::$plugin->getScheduler()->scheduleDelayedTask($task, $tickDelay);
    }

    public static function planRepeatingTask(\Closure $function, int $repeatTickDelay){
        $task = new TaskPlannerTask($function);

        self::$plugin->getScheduler()->scheduleRepeatingTask($task, $repeatTickDelay);
    }

    public static function planRepeatingDelayTask(\Closure $function, int $repeatTickDelay, int $tickDelay){
        $task = new TaskPlannerTask($function);

        self::$plugin->getScheduler()->scheduleDelayedRepeatingTask($task, $tickDelay, $repeatTickDelay);
    }


}