<?php
// N2 Задачи на preg_match[_all] Задачи не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP (не всегда, но такое может быть). С помощью preg_match определите, что переданная строка является доменом вида http://site.ru. Протокол может быть как http, так и https.

// function isValidDomain($string) {
//     $pattern = '/^https?:\/\/[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/';
    
//     return preg_match($pattern, $string) === 1;
// }

// $tests = [
//     "http://asdasd.ru",
//     "https://sdfsdfsfd.ru",
//     "http://gsdfgdsfg.com",
//     "https://asdfasdfa.org",
//     "ftp://asdfasdfa.ru",      
//     "http://gdfhsafsa",        
//     "gdadsrasfdv.ru",           
//     "http://fsadr.r"      
// ];

// foreach ($tests as $test) {
//     echo "$test: " . (isValidDomain($test) ? "верный" : "не верный") . "\n";
// }

// N7 Задачи на preg_match[_all] Задачи не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP (не всегда, но такое может быть). С помощью preg_match определите, что переданная строка является емэйлом. Примеры емэйлов для тестирования mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by, mail@yandex.ru.

// function isValidEmail($string) {
//     $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/';
    
//     return preg_match($pattern, $string) === 1;
// }

// $tests = [
//     "mymail@mail.ru",
//     "my.mail@mail.ru",
//     "my-mail@mail.ru",
//     "my_mail@mail.ru",
//     "mail@mail.com",
//     "mail@mail.by",
//     "mail@yandex.ru",
//     "mail@.ru",        
//     "@mail.ru",        
//     "mail.ru"          
// ];

// foreach ($tests as $test) {
//     echo "$test: " . (isValidEmail($test) ? "верно" : "не верно") . "\n";
// }

// N9 На карманы в самой регулярке Дана строка 'aae xxz 33a'. Найдите все места, где есть два одинаковых идущих подряд символа и замените их на '!'.

// $string = 'aae xxz 33a';
// $pattern = '/(.)\1/';
// $result = preg_replace($pattern, '!', $string);

// echo "Исходная строка: $string\n";
// echo "Результат: $result\n";

// N12 На экранировку посложнее Дана строка 'bbb hello , world eee'. Напишите регулярку, которая найдет содержимое тегов и заменит их на '!'.

// $string = 'bbb <hello> , <world> eee';
// $pattern = '/<[^>]+>/';
// $result = preg_replace($pattern, '!', $string);

// echo "Ввод: $string\n";
// echo "Результат: $result\n";

// N15 На обратный слеш \ Дана строка 'a\a abc'. Напишите регулярку, которая заменит строку 'a\a' на '!'.

// $string = 'a\a a\a a\\a';
// $pattern = '/a\\\\a/';
// $result = preg_replace($pattern, '!', $string);

// echo "Ввод: $string\n";
// echo "Результат: $result\n";

