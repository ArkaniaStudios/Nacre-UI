<?php
declare(strict_types=1);

namespace arkania;

use arkania\form\listener\FormListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    protected function onLoad() : void {
        $this->getLogger()->info('§8-> §eChargement de §6Nacre-UI§e...');
    }


    protected function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new FormListener(), $this);
        $this->getServer()->getCommandMap()->register('nacre', new TestCommand());
    }
}