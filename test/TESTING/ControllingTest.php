<?php

declare(strict_types=1);

namespace Magv20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

$_SESSION['totalpoeng'] = 0;
$_SESSION['poeng'] = 0;
$_SESSION['count'] = array();
$_SESSION['values'] = array();
$_SESSION['saved'] = array();
$_SESSION['yatzyslag'] = 5;
$_SESSION['yatzyrundor'] = 0;
$_SESSION['yatzyturnes'] = 1;
$_SESSION['value'] = 0;
$_SESSION['historik'] = array();

/**
 * Test cases for class Guess.
 */
class ControllerTest extends TestCase
{

    public function testControllerIndexCheck()
    {
        $controller = new Index();
        $this->assertInstanceOf("\Magv20\Controller\index", $controller);
    }

    public function testControllerIndexTest()
    {
        $controller = new Index();
        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerYatzyCheck()
    {
        $controller = new Yatzy();
        $this->assertInstanceOf("\Magv20\Controller\Yatzy", $controller);
    }

    public function testControllerYatzy()
    {
        $controller = new Yatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerYatzyMiddleCheck()
    {
        $controller = new YatzyMiddle();
        $this->assertInstanceOf("\Magv20\Controller\YatzyMiddle", $controller);
    }

    public function testControllerYatzyMiddle()
    {
        $controller = new YatzyMiddle();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerBeforeYatzyCheck()
    {
        $controller = new BeforeYatzy();
        $this->assertInstanceOf("\Magv20\Controller\BeforeYatzy", $controller);
    }

    public function testControllerBeforeYatzy()
    {
        $controller = new BeforeYatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerDiceOneCheck()
    {
        $controller = new Dice1();
        $this->assertInstanceOf("\Magv20\Controller\Dice1", $controller);
    }

    public function testControllerDiceOne()
    {
        $controller = new Dice1();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
