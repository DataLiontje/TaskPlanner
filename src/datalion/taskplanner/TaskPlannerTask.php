<?php


namespace DataLibs;


use pocketmine\scheduler\Task;

class TaskPlannerTask extends Task
{
    /** @var \Closure  */
    private $function;

    public function __construct(\Closure $function)
    {
        $this->function = $function;
    }

    public function onRun(int $currentTick)
    {
        $this->function->__invoke($currentTick, $this);
    }
}