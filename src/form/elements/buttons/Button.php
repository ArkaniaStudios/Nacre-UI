<?php
declare(strict_types=1);

namespace arkania\form\elements\buttons;

use arkania\form\elements\icon\Icon;
use arkania\form\trait\FormTranslationTrait;
use arkania\form\trait\PermissibleTrait;
use JsonSerializable;
use pocketmine\lang\Translatable;
use pocketmine\permission\Permission;

abstract class Button implements JsonSerializable {
    use FormTranslationTrait;
    use PermissibleTrait {
        hasPermission as private;
    }

    private string $name;
    private Translatable|string $text;
    private Icon|null $icon;

    public function __construct(
        string $name,
        Translatable|string $text,
        Permission|string|null $permission = null,
        Icon|null $icon = null
    ) {
        $this->name = $name;
        $this->text = $text;
        $this->icon = $icon;
        if($permission !== null) {
            $this->setPermission($permission);
        }
    }

    public function getName(): string {
        return $this->name;
    }

    public function jsonSerialize() : array {
        return [
            "text" => $this->translate($this->text),
            "image" => $this->icon?->jsonSerialize() ?? null,
            "permission" => $this->permission instanceof Permission ? $this->permission->getName() : $this->permission
        ];
    }

}