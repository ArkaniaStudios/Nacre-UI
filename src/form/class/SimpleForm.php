<?php
declare(strict_types=1);

namespace arkania\form\class;

use arkania\form\BaseForm;
use arkania\form\elements\buttons\Button;
use pocketmine\lang\Translatable;
use pocketmine\permission\Permission;
use pocketmine\player\Player;

class SimpleForm extends BaseForm {

    private Translatable|string $description;

    /** @var Button[] */
    private array $buttons;

    /** @var ?callable */
    private $onSubmit;

    /** @var ?callable */
    private $onClose;

    public function __construct(
        Player $player,
        Translatable|string $title,
        Translatable|string $description = '',
        array $buttons = [],
        ?callable $onSubmit = null,
        ?callable $onClose = null
    ) {
        parent::__construct($player, $title);
        $this->description = $description;
        $this->buttons = $buttons;
        $this->onSubmit = $onSubmit;
        $this->onClose = $onClose;
    }

    public function getType(): string {
        return 'form';
    }

    public function handleResponse(Player $player, $data) : void {
        if($data === null) {
            if($this->onClose !== null) {
                ($this->onClose)($player);
            }
        } else {
            if($this->onSubmit !== null) {
                $button = $this->buttons[$data];
                if(($button->getPermission() !== null && $player->hasPermission($button->getPermission())) || $button->getPermission() === null){
                    ($this->onSubmit)($player, $data);
                } else {
                    $player->sendMessage("§cYou don't have permission to use this button");
                }
            }
        }
    }

    /**
     * @return array<string, string|array<string, Button>|Permission|null>
     */
    public function jsonSerialize() : array {
        return [
            'type' => $this->getType(),
            'title' => $this->title,
            'content' => $this->translate($this->description),
            'buttons' => $this->buttons,
            'permission' => $this->getPermission()
        ];
    }

}