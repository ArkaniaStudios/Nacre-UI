<?php
declare(strict_types=1);

namespace arkania;

use arkania\form\listener\FormListener;
use arkania\gui\listener\MenuListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {
    use SingletonTrait;

    protected function onLoad() : void {
        self::setInstance($this);
        $this->getLogger()->info('§8-> §eChargement de §6Nacre-UI§e...');
    }


    protected function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new FormListener(), $this);
        $this->getServer()->getPluginManager()->registerEvents(new MenuListener(), $this);
        $this->getServer()->getCommandMap()->register('nacre', new TestCommand());
    }
}