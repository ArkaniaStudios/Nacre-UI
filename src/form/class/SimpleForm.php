<?php
declare(strict_types=1);

namespace arkania\form\class;

use arkania\form\BaseForm;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class SimpleForm extends BaseForm {

    public function __construct(
        Player $player,
        Translatable|string $title
    ) {
        parent::__construct($player, $title);
    }

}