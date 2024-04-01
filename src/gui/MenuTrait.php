<?php
declare(strict_types=1);

namespace nacre\gui;

use nacre\form\trait\FormTranslationTrait;
use nacre\form\trait\PermissibleTrait;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

trait MenuTrait {
    use FormTranslationTrait {
        FormTranslationTrait::__construct as private __formTranslationConstruct;
    }
    use PermissibleTrait;

    private string $name;

    private bool $viewOnly;

    /** @var ?callable */
    private $clickHandler;

    /** @var ?callable */
    private $closeHandler;

    public function __construct(
        Player $player,
        Translatable|string $name,
        bool $viewOnly = false,
        ?array $contents = null,
        ?callable $clickHandler = null,
        ?callable $closeHandler = null,
        ?string $permission = null
    ) {
        $this->__formTranslationConstruct($player);
        $this->name = $this->translate($name);
        $this->viewOnly = $viewOnly;
        if($contents !== null){
            $this->setContents($contents);
        }
        $this->clickHandler = $clickHandler;
        $this->closeHandler = $closeHandler;
        if($permission !== null)
            $this->setPermission($permission);
    }

    public function getClickHandler() : ?callable {
        return $this->clickHandler;
    }

    public function getCloseHandler() : ?callable {
        return $this->closeHandler;
    }

    public function getName() : string {
        return $this->name;
    }

    public function isViewOnly() : bool {
        return $this->viewOnly;
    }

    public function onClose(Player $who) : void {
        parent::onClose($who);
        if($this->closeHandler !== null){
            ($this->closeHandler)($who, $this);
        }
    }

}