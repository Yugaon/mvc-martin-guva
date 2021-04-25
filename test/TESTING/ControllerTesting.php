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
class ControllerTestOne extends TestCase
{
    public function testControllerDiceTwo()
    {
        $controller = new Dice2();
        $this->assertInstanceOf("\Magv20\Controller\Dice2", $controller);
    }

    public function testControllerDiceTwoCheck()
    {
        $controller = new Dice2();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerDiceControlCheck()
    {
        $controller = new DiceControl();
        $this->assertInstanceOf("\Magv20\Controller\DiceControl", $controller);
    }

    public function testControllerDiceControl()
    {
        $controller = new DiceControl();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerTwigViewCheck()
    {
        $controller = new TwigView();
        $this->assertInstanceOf("\Magv20\Controller\TwigView", $controller);
    }

    public function testControllerTwigView()
    {
        $controller = new TwigView();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerError()
    {
        $controller = new Error();
        $this->assertInstanceOf("\Magv20\Controller\Error", $controller);
    }

    public function testControllerErrorDo()
    {
        $controller = new Error();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->do404();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerErrorDoo()
    {
        $controller = new Error();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->do405(array());
        $this->assertInstanceOf($exp, $res);
    }
}

class ControllerTestTwo extends TestCase
{

    public function testControllerSampleCheck()
    {
        $controller = new Sample();
        $this->assertInstanceOf("\Magv20\Controller\Sample", $controller);
    }

    public function testControllerSampleWhere()
    {
        $controller = new Sample();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->where();
        $this->assertInstanceOf($exp, $res);
    }

    public function testControllerDebugCheck()
    {
        $controller = new Debug();
        $this->assertInstanceOf("\Magv20\Controller\Debug", $controller);
    }

    public function testControllerDebug()
    {
        $controller = new Debug();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
    public function testControllerSessionCheck()
    {
        $controller = new Session();
        $this->assertInstanceOf("\Magv20\Controller\Session", $controller);
    }

    public function testControllerSessionIndex()
    {
        $controller = new Session();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->index();
        $this->assertInstanceOf($exp, $res);
    }
}
