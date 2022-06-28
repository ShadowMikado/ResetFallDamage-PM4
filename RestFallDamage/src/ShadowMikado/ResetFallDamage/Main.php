<?php


namespace ShadowMikado\ResetFallDamage;


use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;


class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("ResetFallDamage lancé avec succès");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }


    public function fallDamage(EntityDamageEvent $event)
    {
        $player = $event->getEntity();
        if($player instanceof Player)
        if($event->getCause() === EntityDamageEvent::CAUSE_FALL) {
            $event->cancel();
        }

    }

    public function voidDamage(EntityDamageEvent $event)
    {
        $player = $event->getEntity();
        if($player instanceof Player)
            if($event->getCause() === EntityDamageEvent::CAUSE_VOID) {
                $event->cancel();
            }

    }



    public function onDisable(): void
    {
        $this->getServer()->getLogger()->info("ResetFallDamage arrété avec succès");
    }
}