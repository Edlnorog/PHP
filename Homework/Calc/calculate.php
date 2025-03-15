<?php
header('Content-Type: text/plain');

// Включение отладочной информации
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_POST['expression']) || empty(trim($_POST['expression']))) {
    echo "Error: No expression provided";
    exit;
}

$expression = trim($_POST['expression']);

// Валидация
if (!preg_match('/^[0-9+\-*\/\(\)\s]+$/', $expression)) {
    echo "Error: Invalid characters in expression";
    exit;
}

// Проверка баланса скобок
$open = substr_count($expression, '(');
$close = substr_count($expression, ')');
if ($open !== $close) {
    echo "Error: Unbalanced parentheses";
    exit;
}

function calculateExpression($expr) {
    $expr = str_replace(' ', '', $expr);
    
    // Обработка скобок
    while (strpos($expr, '(') !== false) {
        $start = strrpos($expr, '(');
        $end = strpos($expr, ')', $start);
        if ($end === false) return "Error: Invalid expression";
        
        $subExpr = substr($expr, $start + 1, $end - $start - 1);
        $result = calculateSimple($subExpr);
        if (strpos($result, 'Error:') === 0) return $result;
        
        $expr = substr($expr, 0, $start) . $result . substr($expr, $end + 1);
    }
    
    return calculateSimple($expr);
}

function calculateSimple($expr) {
    $parts = preg_split('/([+-])/', $expr, -1, PREG_SPLIT_DELIM_CAPTURE);
    $result = 0;
    $operator = '+';
    
    for ($i = 0; $i < count($parts); $i++) {
        if (empty($parts[$i])) continue; // Пропускаем пустые элементы
        if ($parts[$i] === '+' || $parts[$i] === '-') {
            $operator = $parts[$i];
            continue;
        }
        
        $value = calculateMultDiv($parts[$i]);
        if (strpos($value, 'Error:') === 0) return $value;
        
        if (!is_numeric($value)) return "Error: Invalid number format";
        
        if ($operator === '+') {
            $result += floatval($value);
        } else {
            $result -= floatval($value);
        }
    }
    
    return $result;
}

function calculateMultDiv($expr) {
    $parts = preg_split('/([*\/])/', $expr, -1, PREG_SPLIT_DELIM_CAPTURE);
    if (count($parts) < 1) return "Error: Invalid expression";
    
    $result = floatval($parts[0]);
    
    for ($i = 1; $i < count($parts); $i += 2) {
        if (!isset($parts[$i + 1])) return "Error: Incomplete expression";
        $operator = $parts[$i];
        $nextValue = floatval($parts[$i + 1]);
        
        if ($operator === '*') {
            $result *= $nextValue;
        } elseif ($operator === '/') {
            if ($nextValue == 0) return "Error: Division by zero";
            $result /= $nextValue;
        }
    }
    
    return $result;
}

try {
    $result = calculateExpression($expression);
    if (is_numeric($result)) {
        echo $result;
    } else {
        echo "Error: Invalid expression";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}