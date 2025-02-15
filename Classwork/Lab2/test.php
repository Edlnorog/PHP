<?php
    $array = ['a', 'b', 'c', 'b', 'a'];
    $counts = array_count_values($array);

    print_r($counts);
?>

<?php
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $flippedArray = array_flip($array);

    print_r($flippedArray);
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $reversedArray = array_reverse($array);

    print_r($reversedArray);
?>

<?php
    $keys = ['a', 'b', 'c'];
    $values = [1, 2, 3];

    $combinedArray = array_combine($keys, $values);

    print_r($combinedArray);
?>


<?php
    $array = ['a', 'b', 'c', 'd', 'e'];
    $upperArray = array_map('strtoupper', $array);

    print_r($upperArray);
?>

<?php
    $array1 = [1, 2, 3];
    $array2 = ['a', 'b', 'c'];

    $mergedArray = array_merge($array1, $array2);

    print_r($mergedArray);
?>

<?php
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $randomKey = array_rand($array);

    print_r($randomKey);
?>  

<?php
    $arr=['a', 'b', 'c', 'd', 'e'];
    $replacedarr=array(0 => '!', 3 => '!!');
    print_r(array_replace($arr,$replacedarr));
?>  
