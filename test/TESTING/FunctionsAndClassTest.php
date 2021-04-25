<?php

declare(strict_types=1);

namespace Magv20;

require __DIR__ . "/../../src/game/Dice.php";
require __DIR__ . "/../../src/game/DiceGraphic.php";
require __DIR__ . "/../../src/game/DiceHand.php";
require __DIR__ . "/../../src/game/functions.php";


use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
/**
* Test cases for class Guess.
*/
class FunctionsAndClass extends TestCase
{
    /**
    * Construct object and verify that the object has the expected
    * properties, use no arguments.
    */
    public function testForDice()
    {
        $dice = new Dice(6);
        $this->assertInstanceOf("\Magv20\Dice", $dice);

        $res = $dice->roll();
        $this->assertEquals($res, $res);

        $getLast = $dice->getLastRoll();
        $this->assertEquals($res, $getLast);
    }

    public function testForDiceGraphic()
    {
        $dice = new DiceGraphic(6);
        $this->assertInstanceOf("\Magv20\DiceGraphic", $dice);

        $res = $dice->graphic();

        $exp = "dice-sprite dice-" . $dice->GetlastRoll();

        $this->assertEquals($exp, $res);
    }

    public function testForDiceHand()
    {
        $dice = new DiceHand(6);
        $this->assertInstanceOf("\Magv20\DiceHand", $dice);

        $res = $dice->values();
        $this->assertEquals($res, $res);

        $sum = $dice->sum();
        $this->assertEquals($sum, $sum);

        $dice->roll();
    }

    public function testForFunctios1()
    {
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Test";
        $_SESSION['runda'] = 1;
        $this->assertEquals(true, dice_roll_1());
        $_SESSION['value'] = 22;
        $this->assertEquals(true, dice_roll_1());
    }

    public function testForFunctios2()
    {
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Test";
        $_SESSION['runda'] = 1;
        $this->assertEquals(true, dice_roll_2());
        $_SESSION['value'] = 22;
        $this->assertEquals(true, dice_roll_2());
    }

    public function testForFunctios3()
    {
        $_SESSION['value'] = 21;
        $_SESSION['history'] = "Test";
        $_SESSION['runda'] = 1;
        $this->assertEquals(true, dice_roll_2());
        $this->assertEquals(true, dice_roll_1());
    }

    public function testForFunctios4()
    {
        $_SESSION['value'] = 0;
        $this->assertEquals(true, reset());
    }

    public function testForFunctions5()
    {
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Test";
        $_SESSION['runda'] = 1;
        $this->assertEquals(true, score());
    }
}

class FunctionsAndClassTwo extends TestCase
{
    public function testForFunctions6()
    {
        $_SESSION['value'] = 0;
        $this->assertEquals(true, stop());
    }

    public function testForFunctions7()
    {
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Test";
        $_SESSION['runda'] = 1;
        $_SESSION['computer_value'] = 0;
        $this->assertEquals(true, computer());
        $_SESSION['computer_value'] = 22;
        $this->assertEquals(true, computer());
    }

    public function testForFunctions8()
    {
        $_SESSION['yatzyslag'] = 3;
        $_SESSION['yatzyturnes'] = 0;
        $_SESSION['yatzyrundor'] = 0;
        $_SESSION['values'] = 1;
        $_SESSION['totalpoeng'] = 1;
        $_SESSION['poeng'] = 1;
        $_SESSION['saved'] = array();
        $this->assertEquals(true, rolling_yatzy());
        $_SESSION['yatzyturnes'] = 0;
        $_SESSION['yatzyrundor'] = 3;
        $this->assertEquals(true, rolling_yatzy());
        $_SESSION['yatzyturnes'] = 6;
        $_SESSION['yatzyrundor'] = 3;
        $this->assertEquals(true, rolling_yatzy());
    }

    public function testForFunctions9()
    {
        $object1 = new DiceHand(6);
        $object1->roll();
        $values = $object1->values();
        $_SESSION['values'] = $values;
        $_POST['saving'] = 2;
        $this->assertEquals(true, saving_yatzy());
    }
    public function testForFunctions10()
    {
        $_SESSION['yatzyslag'] = 3;
        $_SESSION['yatzyturnes'] = 0;
        $_SESSION['yatzyrundor'] = 0;
        $_SESSION['values'] = 1;
        $_SESSION['totalpoeng'] = 1;
        $_SESSION['poeng'] = 1;
        $_SESSION['saved'] = array(0, 1, 2, 3, 4, 5, 6);
        $this->assertEquals(true, playing_rounds());
    }

}
