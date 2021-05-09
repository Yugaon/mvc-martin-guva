<?php

/**
 * Standard layout to generate a web page.
 */

declare(strict_types=1);

namespace Magv20;

require __DIR__ . "/../header.php";
include_once __DIR__ . "/../../src/game/functions.php";



?>
<h3>Collect <?php echo $_SESSION['yatzyturnes']?>, this is try <?php echo $_SESSION['yatzyrundor']?>/3</h3>

<form method="post">
    <input class="button" type="submit" name="rolling" id="rolling" value="Roll" /><br/>
</form>

<?


require __DIR__ . "/../footer.php";
