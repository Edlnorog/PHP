<?php
interface AreaCalculator
{
    public function getArea(): float;
}

class Circle implements AreaCalculator
{
    private const PI_VALUE = 3.14159;
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return self::PI_VALUE * pow($this->radius, 2);
    }
}

class Rectangle
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}

class Square implements AreaCalculator
{
    private $side;

    public function __construct(float $side)
    {
        $this->side = $side;
    }

    public function getArea(): float
    {
        return pow($this->side, 2);
    }
}

$shapes = [
    new Square(4),
    new Rectangle(3, 5),
    new Circle(6)
];

foreach ($shapes as $shape) {
    if ($shape instanceof AreaCalculator) {
        echo 'Фигура поддерживает интерфейс AreaCalculator. Площадь равна: ' . $shape->getArea();
        echo '<br>';
        echo 'Класс фигуры: ' . get_class($shape);
    } else {
        echo 'Фигура класса ' . get_class($shape) . ' не поддерживает интерфейс AreaCalculator';
    }
    echo '<BR>';
}