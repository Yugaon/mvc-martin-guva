<?php

declare(strict_types=1);

namespace Magv20;

function dice_roll_1()
{

    $object2 = new DiceGraphic();
    $roll = $object2->roll();
    $_SESSION['value'] = $_SESSION['value'] + $roll;
    ?>
    <table>
    <tr>
    <th>Roll</th>
    <th>Total</th>
    </tr>
    <tr>
      <th><?php echo $roll;?></th>
      <th><?php echo $_SESSION['value'];?></th>
    </tr>
  </table>
  <br> <?php
    if(intval($_SESSION['value']) == 21) {
        echo "CONGRATS";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Du";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;
    }
    else if (intval($_SESSION['value']) > 21) {
        echo "YOU LOST! ";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Computer";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;

    }
}

if(array_key_exists('test1',$_POST)){
   dice_roll_1();
}

function dice_roll_2()
{

    $object2 = new DiceHand(2);
    $roll = $object2->roll();
    $roll = $object2->values();
    $_SESSION['value'] = $_SESSION['value'] + array_sum($roll);
    ?>
    <table>
    <tr>
    <th>Roll 1</th>
    <th>Roll 2</th>
    <th>Total</th>
    </tr>
    <tr>
      <th><?php echo $roll[0];?></th>
      <th><?php echo $roll[1];?></th>
      <th><?php echo $_SESSION['value'];?></th>
    </tr>
  </table>
  <br> <?php
    if ($_SESSION['value'] == 21) {
        echo "CONGRATS";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Du";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;
    }
    else if ($_SESSION['value'] > 21) {
        echo "YOU LOST! ";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Computer";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;

    }
}

if(array_key_exists('test2',$_POST)){
   dice_roll_2();
}



function reset()
{
   $_SESSION['value'] = 0;
}
if(array_key_exists('reset', $_POST)){
   reset();
}

function score()
{
   $_SESSION['historik'] = array();
   $_SESSION['runda'] = 0;
   $_SESSION['value'] = 0;

}
if(array_key_exists('score',$_POST)){
   score();
}

function stop()
{
    echo "Your score is " . $_SESSION['value'];
    computer();
}
if(array_key_exists('stop',$_POST)){
   stop();
}


function computer() {
    $_SESSION['computer_value'] = 0;
    while ($_SESSION['computer_value'] < 21 or $_SESSION['computer_value'] == $_SESSION['value']) {
      $object2 = new DiceGraphic();
      $roll = $object2->roll();
      $_SESSION['computer_value'] = $_SESSION['computer_value'] + $roll;
      if ($_SESSION['computer_value'] == 21 or $_SESSION['computer_value'] == $_SESSION['value'] ) {
          echo "! With a score of " . $_SESSION['computer_value'];
          echo ", the computer wins!";
          $_SESSION['value'] = 0;
          $_SESSION['history'] = "Computer";
          $_SESSION['runda']++;
          $historik = array(
            'vinnare' => $_SESSION['history'],
            'runda' => $_SESSION['runda']
          );
          $_SESSION['historik'][] = $historik;
          break;

      }
      else if ($_SESSION['computer_value'] > 22 and $_SESSION['computer_value'] != 21) {
        echo "! With a score of " . $_SESSION['computer_value'];
        echo ", the computer lost!";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Du";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;
        break;
    }
}
}
