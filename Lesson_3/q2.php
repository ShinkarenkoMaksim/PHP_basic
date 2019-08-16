<h3>Задание 2</h3>
<?php
function renderNumbers () { //Сделано через функцию, как того требует задание...
    $i = 0;
    $result = "";
    do {
        if ($i == 0) {
            $result .= "{$i} - ноль.<br>";
        } else {
            $result .= ($i & 1) ? "{$i} – нечетное число.<br>" : "{$i} – четное число.<br>";
        }
        $i++;
    } while ($i <= 10);
    return $result;
}
echo renderNumbers();