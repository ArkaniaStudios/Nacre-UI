<?php
declare(strict_types=1);

namespace arkania\gui\transaction;

use arkania\gui\BaseMenu;
use pocketmine\item\Item;

final class MenuTransaction {

    private BaseMenu $inventory;
    private Item $source;
    private Item $target;
    private int $slot;

    public function __construct(
        BaseMenu $inventory,
        Item $source,
        Item $target,
        int $slot
    ) {
        $this->inventory = $inventory;
        $this->source = $source;
        $this->target = $target;
        $this->slot = $slot;
    }

    public function getInventory() : BaseMenu {
        return $this->inventory;
    }

    public function getSource() : Item {
        return $this->source;
    }

    public function getTarget() : Item {
        return $this->target;
    }

    public function getSlot() : int {
        return $this->slot;
    }

    public function discard() : MenuTransactionResult {
        return new MenuTransactionResult(true);
    }

    public function continue() : MenuTransactionResult {
        return new MenuTransactionResult(false);
    }

}