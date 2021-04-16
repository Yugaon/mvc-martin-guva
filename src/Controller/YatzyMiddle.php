<?php

declare(strict_types=1);

namespace Magv20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Magv20\Functions\renderView;

/**
 * Controller for the index route.
 */
class YatzyMiddle
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $data = [
            "header" => "YATZY"
        ];

        $body = renderView("layout/yatzy_middle.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
