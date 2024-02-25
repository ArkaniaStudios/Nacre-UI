<?php
declare(strict_types=1);

namespace arkania\form\elements\customs;

use arkania\form\elements\Element;

final class Label extends Element {

    public function __construct(
        string $text
    ) {
        parent::__construct($text);
    }

    public function getType() : string {
        return 'label';
    }

    public function handler($data) : mixed {
        return $data;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize() : array {
        return [
            'type' => $this->getType(),
            'text' => $this->getName()
        ];
    }

}