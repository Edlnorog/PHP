<?php
class Article
{
    private $heading;
    private $content;

    public function __construct(string $heading, string $content)
    {
        $this->heading = $heading;
        $this->content = $content;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function setHeading(string $heading): void
    {
        $this->heading = $heading;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}

class Tutorial extends Article
{
    private $assignment;

    public function __construct(string $heading, string $content, string $assignment)
    {
        parent::__construct($heading, $content);
        $this->assignment = $assignment;
    }

    public function getAssignment(): string
    {
        return $this->assignment;
    }

    public function setAssignment(string $assignment): void
    {
        $this->assignment = $assignment;
    }
}

class PremiumTutorial extends Tutorial
{
    private $cost;

    public function __construct(string $heading, string $content, string $assignment, string $cost)
    {
        parent::__construct($heading, $content, $assignment);
        $this->cost = $cost;
    }

    public function getCost(): string
    {
        return $this->cost;
    }

    public function setCost(string $cost): void
    {
        $this->cost = $cost;
    }
}

$tutorial = new PremiumTutorial(
    'aaaaaaaaaaaaaa', 
    'bbbbbbbbbbbbbbbb', 
    'ccccccccc',
    '149.99'
);
var_dump($tutorial);