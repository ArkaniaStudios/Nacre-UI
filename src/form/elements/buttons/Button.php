<?php
declare(strict_types=1);

namespace nacre\form\elements\buttons;

use JsonSerializable;
use nacre\form\elements\icon\Icon;
use nacre\form\trait\PermissibleTrait;
use pocketmine\permission\Permission;

abstract class Button implements JsonSerializable {
    use PermissibleTrait {
        hasPermission as private;
    }

    private string $name;
    private string $text;
    private Icon|null $icon;

    public function __construct(
        string $name,
        string $text,
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

    /**
     * @return array<string, string|array>
     */
    public function jsonSerialize() : array {
        return [
            "text" => $this->text,
            "image" => $this->icon?->jsonSerialize() ?? null,
            "permission" => $this->permission instanceof Permission ? $this->permission->getName() : $this->permission
        ];
    }

}