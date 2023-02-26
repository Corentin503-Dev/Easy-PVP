<?php

namespace Corentin503;

use pocketmine\player\Player;
use TheStepKla\FormAPI\CustomForm;

class KbForms
{
    public static function formP(Player $player)
    {
        $config = Main::getInstance()->getConfig();

        $form = new CustomForm(function (Player $player, $data) use ($config) {
            if (is_null($data)) return;

            if (is_numeric($data[0]) and is_numeric($data[1]) and is_numeric($data[2])) {
                $config->set("delay", (float)$data[0]);
                $config->set("x", (float)$data[1]);
                $config->set("y", (float)$data[2]);
                $config->save();
                $player->sendMessage("§aVos modification on été enregistré");
            } else $player->sendMessage("§cMerci de ne mettre que des chiffres");
        });
        $form->setTitle("§9KB Custom");
        $form->addInput("Delay", "", $config->get("delay"));
        $form->addInput("X", "", $config->get("x"));
        $form->addInput("Y","", $config->get("y"));
        $form->sendToPlayer($player);
    }
}
