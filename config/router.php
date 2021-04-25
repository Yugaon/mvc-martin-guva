<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$router = $router ?? null;

$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});

$router->addRoute("GET", "/", "\Magv20\Controller\Index");
$router->addRoute("GET", "/diceControl", "\Magv20\Controller\diceControl");
$router->addRoute("POST", "/21_1", "\Magv20\Controller\dice1");
$router->addRoute("POST", "/21_2", "\Magv20\Controller\dice2");
$router->addRoute("GET", "/BeforeYatzy", "\Magv20\Controller\BeforeYatzy");
$router->addRoute("POST", "/yatzy", "\Magv20\Controller\yatzy");
$router->addRoute("POST", "/YatzyMiddle", "\Magv20\Controller\YatzyMiddle");
$router->addRoute("GET", "/debug", "\Magv20\Controller\Debug");
$router->addRoute("GET", "/twig", "\Magv20\Controller\TwigView");

$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Magv20\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\Magv20\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\Magv20\Controller\Sample", "where"]);
});
