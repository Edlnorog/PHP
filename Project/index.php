<?php
    class Cat{
        private $name;
        public $color;
        public $weight;

        function __construct( string $name, string $color, int $weight){
            $this -> name = $name;
            $this -> color = $color;
            $this -> weight = $weight;
        }

        function setName(string $name){ //Чтобы в private добавлять значения
            $this -> name = $name;
        }

        function getName(){ //Чтобы вернуть через echo 
            return $this -> name;
        }
    }

    $cat2 = new Cat('murka', 'black', 8); // Только если construct настроен

    // $cat1 = new Cat();
    // $cat1 -> setName('Barsik');
    // $cat1 -> color = 'grey';
    // $cat1 -> weight = '7';
    echo $cat2 -> getName();
    var_dump($cat2);
    