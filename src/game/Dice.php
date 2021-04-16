<?php

declare(strict_types=1);

namespace Magv20;

class Dice
{
    private $save;
    public $lastroll;
    private $sides;


    public function __construct(int $sides)
    {
        $this->sides = $sides;
    }

    public function roll()
    {
        $this->lastroll = random_int(1, $this->sides);

        return $this->lastroll;
    }
    public function getLastRoll()
    {
        return $this->lastroll;
    }
}
