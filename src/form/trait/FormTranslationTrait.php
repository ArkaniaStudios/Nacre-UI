<?php
declare(strict_types=1);

namespace arkania\form\trait;

use pocketmine\lang\Translatable;
use pocketmine\player\Player;

trait FormTranslationTrait {

    protected Player $player;

    public function __construct(
        Player $player
    ) {
        $this->player = $player;
    }

    public function translate(Translatable|string $text) : string {
        if ($text instanceof Translatable) {
            return $this->player->getLanguage()->translate($text);
        }
        return $text;
    }

}