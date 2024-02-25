<?php
declare(strict_types=1);

namespace arkania\gui;

use pocketmine\permission\Permission;

interface BaseMenu {

    public function isViewOnly() : bool;
    public function getName() : string;
    public function getClickHandler() : ?callable;
    public function getCloseHandler() : ?callable;
    public function getPermission() : Permission|string|null;
}