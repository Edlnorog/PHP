<?php
    $a = 36; $b = '4';
    $c = $a/$b;
    if ($a%$b>0)
        echo gettype($a%$b).' '.$a%$b;
    else
        echo "$a / $b = $c";
?>