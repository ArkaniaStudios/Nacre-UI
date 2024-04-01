<?php
declare(strict_types=1);

namespace nacre\gui\transaction;

class MenuTransactionResult {

    private bool $cancel;

    public function __construct(
        bool $cancel
    ) {
        $this->cancel = $cancel;
    }

    public function isCancelled() : bool {
        return $this->cancel;
    }
}