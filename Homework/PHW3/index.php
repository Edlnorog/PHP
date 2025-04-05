<!-- 26 -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ввод числа</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    $value = null;
    if (isset($_GET['digit'])) {
        $value = $_GET['digit'];
        echo "Вы ввели: " . $value;
    }
    ?>
    <a href="index.php?digit=15" class="btn btn-link">Ссылка</a>
    <form method="GET" action="index.php" class="mt-3">
        <div class="form-group mb-2">
            <label for="inputField" class="form-label">Введите число</label>
            <input class="form-control" id="inputField" name="digit" value="<?= $value ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</body>
</html>

<!-- 27 -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка числа</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    if (!empty($_GET['value'])) {
        $input = $_GET['value'];
        if ($input == 1) {
            echo "Здравствуйте!";
        } elseif ($input == 2) {
            echo "До свидания!";
        }
    }
    ?>
    <a href="index.php?value=1" class="btn btn-link">Нажми сюда</a>
    <form action="index.php" method="GET" class="mt-3">
        <div class="form-group mb-2">
            <label for="numInput" class="form-label">Ваше число</label>
            <input type="number" class="form-control" id="numInput" name="value" value="<?= $input ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-info">Проверить</button>
    </form>
</body>
</html>

<!-- 28 -->
 <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сумма чисел</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    if (isset($_GET['first']) && isset($_GET['second'])) {
        $val1 = $_GET['first'];
        $val2 = $_GET['second'];
        $result = $val1 + $val2;
        echo "Результат: " . $result;
    }
    ?>
    <form method="GET" action="index.php" class="mt-4">
        <div class="form-group mb-3">
            <label for="firstNum" class="form-label">Первое число</label>
            <input type="number" class="form-control" id="firstNum" name="first" value="<?= $val1 ?? '' ?>">
        </div>
        <div class="form-group mb-3">
            <label for="secondNum" class="form-label">Второе число</label>
            <input type="number" class="form-control" id="secondNum" name="second" value="<?= $val2 ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-dark">Посчитать</button>
    </form>
</body>
</html>
