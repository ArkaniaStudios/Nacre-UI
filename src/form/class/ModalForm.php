<?php
declare(strict_types=1);

namespace arkania\form\class;

use arkania\form\BaseForm;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

final class ModalForm extends BaseForm {

    private string $content;
    private string $button1;
    private string $button2;

    /** @var ?callable */
    private $onSubmit;

    /** @var ?callable */
    private $onClose;


    public function __construct(
        Player $player,
        Translatable|string $title,
        Translatable|string $content,
        Translatable|string $button1,
        Translatable|string $button2,
        ?callable $onSubmit = null,
        ?callable $onClose = null
    ) {
        parent::__construct($player, $title);
        $this->content = $this->translate($content);
        $this->button1 = $this->translate($button1);
        $this->button2 = $this->translate($button2);
        $this->onSubmit = $onSubmit;
        $this->onClose = $onClose;
    }

    public function getType() : string {
        return "modal";
    }

    public function handleResponse(Player $player, $data) : void {
        if($data !== null){
            if($this->onSubmit !== null){
                ($this->onSubmit)($player, $data);
            }
        }else{
            if($this->onClose !== null){
                ($this->onClose)($player);
            }
        }
    }

    public function jsonSerialize() : array {
        return [
            'type' => $this->getType(),
            'title' => $this->title,
            'content' => $this->content,
            'button1' => $this->button1,
            'button2' => $this->button2,
            'permission' => $this->permission
        ];
    }

}