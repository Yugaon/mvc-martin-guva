<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Magv20\Functions\{
    getBaseUrl,
    getCurrentUrl,
    getRoutePath
};

echo "<h1>Debug detais</h1>";

var_dump(getBaseUrl());
var_dump(getCurrentUrl());
var_dump(getRoutePath());
var_dump($_SERVER);
