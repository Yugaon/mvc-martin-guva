<?php

/**
 * Standard layout to generate a web page.
 */

declare(strict_types=1);

namespace Magv20;

require __DIR__ . "/../header.php";
require __DIR__ . "/../standard.php";

?>


<form method="post">
    <input class="button" type="submit" name="test1" id="test1" value="ROLL" /><br/>
</form>

<form method="post">
    <input class="button" type="submit" name="reset" id="reset" value="RESET" /><br/>
</form>

<form method="post">
    <input class="button" type="submit" name="stop" id="stop" value="STOP" /><br/>
</form>

<form method="post">
    <input class="button" type="submit" name="score" id="score" value="RESET SCORE TABLE" /><br/>
</form>


<?php
include_once __DIR__ . "/../../src/game/functions.php";

foreach ($_SESSION['historik'] as $row) : array_map('htmlentities', $row) ?>

<br>
<table>
    <th>Vinnare</th>
    <th>Runda</th>
    <tr>

      <th><?php echo implode('</td><td>', $row); ?></th>
    </tr>
</table>
<?php endforeach; ?> <?php

require __DIR__ . "/../footer.php";
