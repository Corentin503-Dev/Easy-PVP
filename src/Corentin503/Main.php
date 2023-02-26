<?php

namespace Corentin503;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements Listener
{
    use SingletonTrait;

    protected function onEnable(): void
    {
        self::setInstance($this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getServer()->getCommandMap()->register("", new KBCommand());
    }

    public function creationPlayer(PlayerCreationEvent $event)
    {
        $event->setPlayerClass(PlayerCustom::class);
    }

    public function onDamage(EntityDamageEvent $event)
    {
        if ($event->getEntity() instanceof Player) {
            $delay = (int)$this->getConfig()->get("delay");
            $event->setAttackCooldown($delay);
        }
    }
}
