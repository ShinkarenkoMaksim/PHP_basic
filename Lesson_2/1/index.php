<?php
$a = (int)rand(-10, 10);
$b = (int)rand(-10, 10);

if ($a >= 0 && $b >= 0) {
    echo abs($a - $b);
} elseif ($a < 0 && $b < 0 ) {
    echo $a * $b;
} else {
    echo $a + $b;
}