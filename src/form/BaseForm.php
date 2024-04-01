<?php
declare(strict_types=1);

namespace nacre\form;

use nacre\form\trait\PermissibleTrait;
use pocketmine\form\Form;
use pocketmine\player\Player;

abstract class BaseForm implements Form {
    use PermissibleTrait {
        PermissibleTrait::__construct as private __permissibleConstruct;
    }

    protected string $title;

    public function __construct(
        Player $player,
        string $title
    ) {
        $this->__permissibleConstruct($player);
        $this->player = $player;
        $this->title = $title;
    }

    abstract public function getType() : string;

}