<?php
declare(strict_types=1);

namespace arkania\form\class;

use arkania\form\BaseForm;
use arkania\form\elements\Element;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

final class CustomForm extends BaseForm {

    /** @var Element[] */
    private array $elements;

    /** @var ?callable */
    private $onSubmit;

    /** @var ?callable */
    private $onClose;


    public function __construct(
        Player $player,
        Translatable|string $title,
        array $elements = [],
        ?callable $onSubmit = null,
        ?callable $onClose = null
    ) {
        parent::__construct($player, $title);

        $this->elements = $elements;
        $this->onSubmit = $onSubmit;
        $this->onClose = $onClose;
    }

    public function getType() : string {
        return 'custom_form';
    }

    public function handleResponse(Player $player, $data) : void {
        if ($data === null) {
            if ($this->onClose !== null) {
                ($this->onClose)($player);
            }
            return;
        }
        $count = [];
        foreach ($data as $key => $value) {
            $element     = $this->elements[$key];
            $elementName = $element->getName();
            if (isset($data[$elementName])) {
                $count[$elementName]++;
                $data[$elementName . '-' . $count[$elementName]] = $element->handle($value);
            } else {
                $count[$elementName] = 1;
                $data[$elementName]  = $element->handler($value);
            }
            unset($data[$key]);
        }

        unset($this->labels);
        if ($this->onSubmit !== null) {
            ($this->onSubmit)($player, $data);
        }
    }

    public function jsonSerialize() : array {
        return [
            'type' => $this->getType(),
            'title' => $this->title,
            'content' => $this->elements,
            'permission' => $this->permission
        ];
    }
}