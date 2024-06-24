<?php
declare(strict_types=1);

namespace nacre\bossbar;

use pocketmine\network\mcpe\protocol\types\BossBarColor as BarColor;

class BossBarColor {

    const PINK = BarColor::PINK;
    const BLUE = BarColor::BLUE;
    const RED = BarColor::RED;
    const GREEN = BarColor::GREEN;
    const YELLOW = BarColor::YELLOW;
    const PURPLE = BarColor::PURPLE;
    const REBECCA_PURPLE = BarColor::REBECCA_PURPLE;
    const WHITE = BarColor::WHITE;

    /** @var string[] */
    public static array $colorNames = [
        self::PINK => "pink",
        self::BLUE => "blue",
        self::RED => "red",
        self::GREEN => "green",
        self::YELLOW => "yellow",
        self::PURPLE => "purple",
        self::REBECCA_PURPLE => "rebecca_purple",
        self::WHITE => "white",
    ];

    /**
     * Get all available boss bar colors.
     *
     * @return int[]
     */
    public static function getColors(): array {
        return array_keys(self::$colorNames);
    }

    /**
     * Get color constant by color name.
     *
     * @param string $colorName
     * @return int
     * @throws \InvalidArgumentException
     */
    public static function getColorByName(string $colorName): int {
        $colorNameLower = strtolower($colorName);
        foreach (self::$colorNames as $color => $name) {
            if ($colorNameLower === strtolower($name)) {
                return $color;
            }
        }
        throw new \InvalidArgumentException("Invalid color name specified: " . $colorName);
    }

}
