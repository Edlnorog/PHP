<?php

abstract class Person
{
    protected $fullName;

    public function __construct(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    abstract protected function sayHello(): string;
    abstract protected function presentName(): string;

    public function makeIntroduction(): string
    {
        return $this->sayHello() . '! ' . $this->presentName() . ' ' . $this->getFullName() . '.';
    }
}

class RussianPerson extends Person 
{
    protected function sayHello(): string
    {
        return 'Здравствуйте';
    }

    protected function presentName(): string
    {
        return 'Моё имя';
    }
}

class EnglishPerson extends Person 
{
    protected function sayHello(): string
    {
        return 'Hi';
    }

    protected function presentName(): string
    {
        return 'I am';
    }
}

$person_ru = new RussianPerson('Иванов Сергей');
$greeting_ru = $person_ru->makeIntroduction();

$person_en = new EnglishPerson('Ivanov Sergey');
$greeting_en = $person_en->makeIntroduction();

print $greeting_ru . "<BR>";
print $greeting_en . "<BR>";