<?php
    $arr=['a', 'b', 'c', 'd', 'e'];
    $replacedarr=array(0 => '!', 3 => '!!');
    print_r(array_replace($arr,$replacedarr));
?>  