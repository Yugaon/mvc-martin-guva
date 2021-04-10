<?php

declare(strict_types=1);

namespace Magv20;

class DiceHand
{
     private $dices;
     private $values;
    private $sides = 6;
    private $save;


    public function __construct(int $dices)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice($this->sides);
            $this->values[] = null;
        }
    }

    public function roll() {
      for ($i = 0; $i < count($this ->dices); $i++) {
        $save = random_int(1, $this->sides);
        $this->values[$i] = $save;
      }


}
    public function values() {
      return $this->values;
    }

    public function sum() {
      return array_sum($this->values);
    }
}
