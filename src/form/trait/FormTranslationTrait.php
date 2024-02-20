<?php
declare(strict_types=1);

namespace arkania\form\trait;

use pocketmine\lang\Translatable;

trait FormTranslationTrait {

    public function translate(Translatable|string $text) : string {
        if ($text instanceof Translatable) {
            return $this->player->getLanguage()->translate($text);
        }
        return $text;
    }

}