<?php

namespace src\Controllers;
use src\View\View;

/**
 * Основной контроллер приложения
 * Отвечает за обработку базовых запросов и отображение главных страниц
 */
class MainController {
    /** @var View Объект для работы с представлениями */
    private $view;
    
    /**
     * Конструктор контроллера
     * Инициализирует объект View с путем к директории шаблонов
     */
    public function __construct(){
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
    }
    
    /**
     * Отображает приветственную страницу
     * @param string $name Имя пользователя для приветствия
     */
    public function sayHello(string $name){
        $this->view->renderHtml('main/hello', ['name' => $name]);
    }

    /**
     * Отображает страницу прощания
     * @param string $name Имя пользователя для прощания
     */
    public function sayBye(string $name){
        $this->view->renderHtml('main/bye', ['name' => $name]);
    }
}