<?php

namespace HarixTeam;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Speed extends PluginBase implements Listener{

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info("Speed On");
    }

    public function onCommand(CommandSender $player, Command $command, string $label, array $args): bool
    {
        if ($command->getName() === "speed"){

            if ($player instanceof Player){

                if ($player->hasPermission("speed.use")){

                    if (!$player->hasEffect(Effect::SPEED)){

                        $effect = new EffectInstance(Effect::getEffect(Effect::SPEED), 999999999, 4, false);
                        $player->addEffect($effect);
                        $player->sendPopup("§2Speed On");
                    } else {

                        $player->removeEffect(Effect::SPEED);
                        $player->sendPopup("§4Speed Off");
                    }

                }else{
                    $player->sendMessage("§cVous avez pas la permission pour cette commmande");
                }


            }else{
                $player->sendMessage("Vous devez faire cette commande en jeu");
            }

        }


        return true;
    }
}