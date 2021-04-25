<?php

/**
 * Standard layout to generate a web page.
 */

 declare(strict_types=1);

 namespace Magv20;

require __DIR__ . "/../header.php";
require __DIR__ . "/../standard.php";

/**
*$object = new Dice();
*echo $object->roll();
*var_dump($object->LastSave());
 */
$_SESSION['value'] = 0;?>

<h3>Let's play 21</h3>
  <form action="21_1" method="POST">
    <input class="button" type="submit" value="One die">
  </form>
  <form action="21_2" method="POST">
    <input class="button" type="submit" value="Two dice">
  </form>
<?php require __DIR__ . "/../footer.php";
