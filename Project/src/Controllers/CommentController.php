<?php
namespace src\Controllers;

use src\View\View;
use src\Models\Comments\Comment;
use src\Models\Articles\Article;

/**
 * Контроллер для управления комментариями
 * Обрабатывает запросы на создание, редактирование и обновление комментариев
 */
class CommentController
{
    /** @var View Объект для работы с представлениями */
    private $view;

    /**
     * Конструктор контроллера
     * Инициализирует объект View с путем к директории шаблонов
     */
    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
    }

    /**
     * Создает новый комментарий к статье
     * @param int $articleId ID статьи, к которой добавляется комментарий
     */
    public function store(int $articleId)
    {
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(1); 
        $comment->setArticleId($articleId);
        $comment->save();
        $bUrl = dirname($_SERVER['SCRIPT_NAME']); 
        header("Location: {$bUrl}/article/{$articleId}#comment{$comment->getId()}");
    }

    /**
     * Отображает форму редактирования комментария
     * @param int $id ID комментария для редактирования
     * @throws \Exception если комментарий не найден
     */
    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        if (!$comment) {
            throw new \Exception();
        }
        $this->view->renderHtml3('comment/edit.php', [
            'comment' => $comment,
            'error' => null
        ]);
    }

    /**
     * Обновляет существующий комментарий
     * @param int $id ID комментария для обновления
     */
    public function update(int $id)
    {
        $comment = Comment::getById($id); 
        $comment->setText($_POST['text']);
        $comment->save();
        $rUrl = dirname($_SERVER['SCRIPT_NAME']).'/article/'.$comment->getArticleId().'#comment'.$comment->getId();
        header("Location: $rUrl");
    }
}