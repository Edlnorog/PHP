<?php
    // $arr= [1,'r',8,1];

    // for($i=0;$i<sizeof($arr);$i++){
    //     echo $arr[$i]." ";
    // }

    // echo '<br/>';

    // $arr2['a'] = 2;
    // $arr2['b'] = 'r';
    // $arr2['c'] = 8;
    // $arr2['d'] = 1;

    // foreach($arr2 as $key){
    //     echo $key." ";
    // }

    function f($a,$b): int {
        global $c = $a + $b;
        return $a + $b;
    }

    echo f(5, 3).' ';
    echo gettype(f(4,3)).' ';
    echo $c.' ';
?>