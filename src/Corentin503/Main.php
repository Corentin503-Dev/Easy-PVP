<?php

namespace Corentin503;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements Listener
{
    use SingletonTrait;

    protected function onEnable(): void
    {
        self::setInstance($this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("", new KBCommand());
    }

    public function creationPlayer(PlayerCreationEvent $event)
    {
        $event->setPlayerClass(PlayerCustom::class);
    }
}