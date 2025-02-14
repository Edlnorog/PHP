<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат работы get_headers</title>
</head>
<body>
    <h1>Результат работы функции get_headers</h1>
    <textarea rows="20" cols="100">
<?php
    $url = "https://httpbin.org";
    $headers = get_headers($url);
    foreach ($headers as $header) {
        echo $header . "\n";
    }
?>
    </textarea>
</body>
</html>