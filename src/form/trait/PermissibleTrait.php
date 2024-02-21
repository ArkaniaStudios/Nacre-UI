<?php
declare(strict_types=1);

namespace arkania\form\trait;

use pocketmine\permission\Permission;

trait PermissibleTrait {

     private Permission|string|null $permission = null;

        public function setPermission(Permission|string $permission) : void {
            $this->permission = $permission;
        }

        public function getPermission() : Permission|string|null {
            return $this->permission;
        }

        public function hasPermission() : bool {
            return $this->player->hasPermission($this->permission);
        }

}