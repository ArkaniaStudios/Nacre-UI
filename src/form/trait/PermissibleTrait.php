<?php
declare(strict_types=1);

namespace arkania\form\trait;

use pocketmine\permission\Permission;
use pocketmine\player\Player;

trait PermissibleTrait {
    public function __construct(Player $player) {
        $this->player = $player;
    }

    protected Permission|string|null $permission = null;

    public function setPermission(Permission|string $permission) : void {
        $this->permission = $permission;
    }

    public function getPermission() : Permission|string|null {
        return $this->permission;
    }

    public function hasPermission() : bool {
        if($this->permission === null)
            return true;
        return $this->player->hasPermission($this->permission);
    }

}