<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
</head>
<body>
    <h1>Форма обратной связи</h1>
    <form action="https://httpbin.org/post" method="post">
        <label for="username">Имя пользователя:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">E-mail пользователя:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="type">Тип обращения:</label><br>
        <select id="type" name="type" required>
            <option value="жалоба">Жалоба</option>
            <option value="предложение">Предложение</option>
            <option value="благодарность">Благодарность</option>
        </select><br><br>

        <label for="message">Текст обращения:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>

        <label>Вариант ответа:</label><br>
        <input type="checkbox" id="response_sms" name="response[]" value="смс">
        <label for="response_sms">СМС</label><br>
        <input type="checkbox" id="response_email" name="response[]" value="e-mail">
        <label for="response_email">E-mail</label><br><br>

        <input type="submit" value="Отправить">
    </form>

    <br>
    <a href="next.php">Перейти на вторую страницу</a>
</body>
</html>