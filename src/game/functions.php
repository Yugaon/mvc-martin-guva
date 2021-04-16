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
    if (intval($_SESSION['value']) == 21) {
        echo "CONGRATS";
        $_SESSION['value'] = 0;
        $_SESSION['history'] = "Du";
        $_SESSION['runda']++;
        $historik = array(
          'vinnare' => $_SESSION['history'],
          'runda' => $_SESSION['runda']
        );
        $_SESSION['historik'][] = $historik;
    } else if (intval($_SESSION['value']) > 21) {
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

if (array_key_exists('test1', $_POST)) {
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
    } else if ($_SESSION['value'] > 21) {
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

if (array_key_exists('test2', $_POST)) {
    dice_roll_2();
}



function reset()
{
    $_SESSION['value'] = 0;
}
if (array_key_exists('reset', $_POST)) {
    reset();
}

function score()
{
    $_SESSION['historik'] = array();
    $_SESSION['runda'] = 0;
    $_SESSION['value'] = 0;
}
if (array_key_exists('score', $_POST)) {
    score();
}

function stop()
{
    echo "Your score is " . $_SESSION['value'];
    computer();
}
if (array_key_exists('stop', $_POST)) {
    stop();
}


function computer()
{
    $_SESSION['computer_value'] = 0;
    while ($_SESSION['computer_value'] < 21 or $_SESSION['computer_value'] == $_SESSION['value']) {
        $object2 = new DiceGraphic();
        $roll = $object2->roll();
        $_SESSION['computer_value'] = $_SESSION['computer_value'] + $roll;
        if ($_SESSION['computer_value'] == 21 or $_SESSION['computer_value'] == $_SESSION['value']) {
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
        } else if ($_SESSION['computer_value'] > 22 and $_SESSION['computer_value'] != 21) {
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


function rolling_yatzy()
{
    if ($_SESSION['yatzyturnes'] == 6 and $_SESSION['yatzyrundor'] == 3) {
        done_with_game();
    }
    if ($_SESSION['yatzyrundor'] == 3) {
        playing_rounds();
    }

    $object1 = new DiceHand($_SESSION['yatzyslag']);
    $object1->roll();
    $values = $object1->values();
    $_SESSION['values'] = $values;
    present_save($_SESSION['saved']);
    present_info($values);
    $_SESSION['yatzyrundor']++;
}
if (array_key_exists('rolling', $_POST)) {
    rolling_yatzy();
}

function saving_yatzy()
{
    $_SESSION['saved'][] = $_POST['saving'];
    $searched = array_search($_POST['saving'], $_SESSION['values']);
    \array_splice($_SESSION['values'], $searched, 1);
    $_SESSION['yatzyslag']--;


    present_save($_SESSION['saved']);
    present_info($_SESSION['values']);
}
if (array_key_exists('saving', $_POST)) {
    saving_yatzy();
}

function present_info($values)
{
    ?>
    <p class="dice-utf8">

    <?php for ($i = 0; $i < count($values); $i++) { ?>
      <i class="dice-sprite dice-<?=$values[$i]?>"></i>
      <form action="YatzyMiddle" method="POST">
          <input class="button" type="submit" name="saving" id="saving" value="<?= $values[$i]?>" /><br/>
      </form>
    <?php } ?>
<?php }



function present_save($values)
{
    ?>
    <h3>Saved dice:</h3>
    <p class="dice-utf8">
      <?php for ($i = 0; $i < count($values); $i++) { ?>
      <i class="dice-sprite dice-<?=$values[$i]?>"></i>
      <?php } ?>
</p><br>
<br>
<br>
<br>

<?php }

function playing_rounds()
{
    $counted = array_count_values($_SESSION['saved']);
    if (count($_SESSION['saved']) != 0) {
        $_SESSION['poeng'] = $counted[$_SESSION['yatzyturnes']] * $_SESSION['yatzyturnes'];
    }

    $_SESSION['totalpoeng'] = $_SESSION['totalpoeng'] + $_SESSION['poeng'];
    ?> <h3> Your total point for round <?php echo $_SESSION['yatzyturnes'] ?>  is <?php echo $_SESSION['poeng'] ?> </h3>
      <h3>Your total point for the game is <?php echo $_SESSION['totalpoeng'] ?>
    <?php
    $_SESSION['yatzyturnes']++;
    $_SESSION['count'] = array();
    $_SESSION['values'] = array();
    $_SESSION['saved'] = array();
    $_SESSION['yatzyslag'] = 5;
    $_SESSION['yatzyrundor'] = 0;
    $_SESSION['poeng'] = 0;
    ?>
    <form action="yatzy" method="POST">
        <input type="hidden" /><br/>
    </form> <?php
}

function done_with_game()
{
    ?> <h2> Congratulations your final score of the game is <?php echo $_SESSION['totalpoeng'] ?></h2>
    <h2>You can now start to play again!</h2>
    <?php
    $_SESSION['totalpoeng'] = 0;
    $_SESSION['poeng'] = 0;
    $_SESSION['count'] = array();
    $_SESSION['values'] = array();
    $_SESSION['saved'] = array();
    $_SESSION['yatzyslag'] = 5;
    $_SESSION['yatzyrundor'] = 0;
    $_SESSION['yatzyturnes'] = 1;
}
