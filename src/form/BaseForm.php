<?php
declare(strict_types=1);

namespace arkania\form;

use arkania\form\trait\FormTranslationTrait;
use arkania\form\trait\PermissibleTrait;
use pocketmine\form\Form;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

abstract class BaseForm implements Form {
    use FormTranslationTrait{
        FormTranslationTrait::__construct as private __formTranslationConstruct;
    }
    use PermissibleTrait {
        PermissibleTrait::__construct as private __permissibleConstruct;
    }

    protected Translatable|string $title;

    public function __construct(
        Player $player,
        Translatable|string $title
    ) {
        $this->__formTranslationConstruct($player);
        $this->__permissibleConstruct($player);
        $this->player = $player;
        $this->title = $title;
    }

    abstract public function getType();

}