<?php
declare(strict_types=1);

namespace arkania\form\trait;

trait PermissibleTrait {

     private ?string $permission = null;

        public function setPermission(string $permission) : void {
            $this->permission = $permission;
        }

        public function getPermission() : ?string {
            return $this->permission;
        }

        public function hasPermission() : bool {
            return $this->player->hasPermission($this->permission);
        }

}