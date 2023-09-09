<?php

namespace Corentin503EPVP;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\DefaultPermissions;
use pocketmine\player\Player;
use pocketmine\Server;

class KBCommand extends Command
{
    public function __construct()
    {
        parent::__construct("kb", "Permet de gérer les kb", "/kb", ["kbcustom", "knockback"]);
        
        $this->setPermission(DefaultPermissions::ROOT_OPERATOR);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (($sender->hasPermission("knockback.use")) or (Server::getInstance()->isOp($sender->getName()))) {
                KbForms::formP($sender);
            } else $sender->sendMessage("§cVous n'avez pas la permission de faire ceci !");
        }
    }
}
