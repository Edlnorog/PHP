<?php
    // $c=7;
    // $a = &$c;

    // function test($s){
    //     ++$s;
    // }
    // echo $c. '<br>';
    // test($c);
    // echo $c;
?>
    
    <?php
    // $c=7;
    // $a = &$c;

    // function test($s){
    //     ++$s;
    // }
    // echo $c. '<br>';
    // test($c);
    // echo $c;

    function transformWord(&$word){
   
        for ($i=0; $i<count($word); ++$i){
            if ($i%2==1){
               
                $word[$i] = strtoupper($word[$i]);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <textarea name="text" rows="5" cols="100" ></textarea>
        <br/>
        <input type="submit" value="Преобразовать">
    </form>

    <?php
        // if (($_SERVER['REQUEST_METHOD' === 'POST']) && isset($_POST['text'])){
        $text = $_POST['text'];
        $word = explode(" ", $text);
        transformWord($word);
        $newword = implode(" ", $word);
        echo "Преобразованное"."<br/>";
        echo $newword;
        // }
    ?>
</body>
</html>
