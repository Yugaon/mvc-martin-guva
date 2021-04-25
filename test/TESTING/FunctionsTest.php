<?php

declare(strict_types=1);

namespace Magv20\Functions;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class FunctionsTest extends TestCase
{
    public function testGetRoutePath()
    {
        $res = getRoutePath();
        $this->assertEmpty($res);
    }

    public function testRenderView()
    {
        $res = renderView("standard.php");
        $this->assertIsString($res);
    }

    public function testRenderTwigView()
    {
        $res = renderTwigView("index.html");
        $this->assertIsString($res);
    }

    public function testUrl()
    {
        $res = url("/");
        $this->assertIsString($res);
    }

    public function testGetBaseUrl()
    {
        $res = getBaseUrl();
        $this->assertIsString($res);
    }

    public function testGetCurrentUrl()
    {
        $res = getCurrentUrl();
        $this->assertIsString($res);
    }
}
