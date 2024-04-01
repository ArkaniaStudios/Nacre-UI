<?php
declare(strict_types=1);

namespace nacre\form\elements\customs;

use nacre\form\elements\Element;

final class Slider extends Element {

    private string $text;
    private int $min;
    private int $max;
    private int $step;
    private int $default;

    public function __construct(
        string $name,
        string $text,
        int $min = 0,
        int $max = 100,
        int $step = 1,
        int $default = 0
    ) {
        parent::__construct($name);
        $this->text = $text;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->default = $default;
    }

    public function getType() : string {
        return 'slider';
    }

    public function handler($data) : int|float {
        return $data;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize() : array {
        return [
            'type' => $this->getType(),
            'text' => $this->text,
            'min' => $this->min,
            'max' => $this->max,
            'step' => $this->step,
            'default' => $this->default
        ];
    }

}