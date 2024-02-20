<?php
declare(strict_types=1);

namespace arkania\form;

use arkania\form\trait\FormTranslationTrait;
use arkania\form\trait\PermissibleTrait;
use pocketmine\form\Form;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

abstract class BaseForm implements Form {
    use FormTranslationTrait;
    use PermissibleTrait;

    protected Player $player;
    private Translatable|string $title;

    public function __construct(
        Player $player,
        Translatable|string $title
    ) {
        $this->player = $player;
        $this->title = $title;
    }

    abstract public function getType();

}