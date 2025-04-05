<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User;
use Exception;

/**
 * Контроллер для управления статьями
 * Обрабатывает запросы на создание, просмотр, редактирование и удаление статей
 */
class ArticleController {
    /** @var View Объект для работы с представлениями */
    private $view;
    
    /** @var Db Объект для работы с базой данных */
    private $db;

    /**
     * Конструктор контроллера
     * Инициализирует объекты View и Db
     */
    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
        $this->db = Db::getInstance();
    }

    /**
     * Отображает список всех статей
     * Получает все статьи из базы данных и передает их в шаблон
     */
    public function index() {
        $articles = Article::findAll(); // запрос всех статей с помощью через метод findAll который реализован в ARE.php
        $this->view->renderHtml('main/main', ['articles' => $articles]); // рендерит шаблон, передавая все статьи
    }

    /**
     * Отображает отдельную статью и её комментарии
     * @param int $id ID статьи для отображения
     * @throws NotFoundException если статья не найдена
     */
    public function show(int $id) // тут смотрим одну статью 
    {
        $article = Article::getById($id);
        if (!$article) {
            throw new NotFoundException();
        }

        $comments = Comment::findAllByArticleId($id) ?? []; 
        
        $this->view->renderHtml('article/show', [ //тут рендерим шаблон article/show и передаем статью, автора и комментарии 
            'article' => $article,
            'author' => $article->getAuthor(),
            'comments' => $comments
        ]);
    }

    /**
     * Удаляет статью из базы данных
     * @param int $id ID статьи для удаления
     * @throws NotFoundException если статья не найдена
     */
    public function delete(int $id) 
    {
        $article = Article::getById($id);
        if (!$article) {
            throw new NotFoundException();
        }
        $article->delete(); // тут удаляем статью через delete() - метод из ActiveRecordEntity
        header("Location: http://localhost/PHP/Project/www/");
    }
    
    /**
     * Отображает форму создания новой статьи
     */
    public function create(){
        return $this->view->renderHtml('article/create');  // тут рендерим форму создания статьи templates/article/create.php
    }

    /**
     * Отображает форму редактирования статьи
     * @param int $id ID статьи для редактирования
     */
    public function edit(int $id){
        $article = Article::getById($id);
        return $this->view->renderHtml('/article/edit', ['article'=>$article]); // тут рендерим форму редактирования templates/article/edit.phр, передавая id статьи 
    }

    /**
     * Обновляет существующую статью
     * @param int $id ID статьи для обновления
     * @throws NotFoundException если статья не найдена
     */
    public function update(int $id)
    {
        $article = Article::getById($id); // тут вызываем метод getById() из класса Article, который наследуется от ActiveRecordEntity
        if (!$article) {
            throw new NotFoundException();
        }
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->save(); // запрос на сохранение идет от объекта модели - active record
        header("Location: http://localhost/PHP/Project/www/");
    }

    /**
     * Создает новую статью
     * Сохраняет данные из формы в базу данных
     */
    public function store() // функция для сохранения новых статей
    {
        $article = new Article(); // создали новый объект
        $article->setName($_POST['name']);
        $article->setText($_POST['text'] ?? '');
        $article->setAuthorId(1); 
        $article->save(); // INSERT to Db
        header("Location: http://localhost/PHP/Project/www/"); 
    }
}