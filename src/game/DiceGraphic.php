<?php

declare(strict_types=1);

namespace Magv20;

class DiceGraphic extends Dice
{

    const SIDES = 6;

    public function __construct()
    {
        parent::__construct(self::SIDES);
    }

    public function graphic()
    {
        return "dice-sprite dice-" .  $this->getLastroll();
    }
}
