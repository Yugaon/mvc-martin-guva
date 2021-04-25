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
$_SESSION['totalpoeng'] = 0;
$_SESSION['poeng'] = 0;
$_SESSION['count'] = array();
$_SESSION['values'] = array();
$_SESSION['saved'] = array();
$_SESSION['yatzyslag'] = 5;
$_SESSION['yatzyrundor'] = 0;
$_SESSION['yatzyturnes'] = 1;
?>
<h3>Let's play Yatzy</h3>
  <form action="yatzy" method="POST">
    <input class="button" type="submit" value="Play">
  </form>
<?php require __DIR__ . "/../footer.php";
