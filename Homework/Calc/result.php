<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculation Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .result-box {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            text-align: center;
        }
        .result {
            font-size: 18px;
            color: green;
        }
        .error {
            font-size: 18px;
            color: red;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <?php
        if (isset($_GET['result'])) {
            echo '<div class="result">Result: ' . htmlspecialchars($_GET['result']) . '</div>';
        } elseif (isset($_GET['error'])) {
            echo '<div class="error">Error: ' . htmlspecialchars($_GET['error']) . '</div>';
        } else {
            echo '<div class="error">No result or error provided.</div>';
        }
        ?>
        <a href="index.html">Back to Calculator</a>
    </div>
</body>
</html>