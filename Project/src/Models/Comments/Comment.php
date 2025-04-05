<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Services\Db;
use DateTime;

/**
 * Класс Comment представляет модель комментария в системе
 * Наследуется от ActiveRecordEntity для реализации паттерна Active Record
 * Обеспечивает работу с таблицей 'comments' в базе данных
 */
class Comment extends ActiveRecordEntity
{
    /** @var string Текст комментария */
    protected $messageText;
    
    /** @var int Идентификатор автора комментария */
    protected $authorIdentifier;
    
    /** @var int Идентификатор статьи, к которой относится комментарий */
    protected $articleIdentifier;
    
    /** @var string Дата и время создания комментария */
    protected $creationTimestamp;

    /**
     * Получает текст комментария с экранированием специальных символов
     * @return string Безопасный для вывода текст комментария
     */
    public function getText(): string
    {
        return htmlspecialchars($this->messageText);
    }

    /**
     * Получает объект автора комментария
     * @return User Объект пользователя - автора комментария
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorIdentifier);
    }

    /**
     * Получает идентификатор статьи, к которой относится комментарий
     * @return int ID статьи
     */
    public function getArticleId(): int
    {
        return $this->articleIdentifier;
    }

    /**
     * Получает дату и время создания комментария в отформатированном виде
     * @return string Дата и время в формате "дд.мм.гггг чч:мм"
     */
    public function getCreatedAt(): string
    {
        $dateTime = new DateTime($this->creationTimestamp);
        return $dateTime->format('d.m.Y H:i');
    }

    /**
     * Устанавливает текст комментария
     * Удаляет лишние пробелы в начале и конце строки
     * @param string $text Текст комментария
     */
    public function setText(string $text): void
    {
        $this->messageText = trim($text);
    }

    /**
     * Устанавливает идентификатор автора комментария
     * @param int $authorId ID автора
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorIdentifier = $authorId;
    }

    /**
     * Устанавливает идентификатор статьи, к которой относится комментарий
     * @param int $articleId ID статьи
     */
    public function setArticleId(int $articleId): void
    {
        $this->articleIdentifier = $articleId;
    }

    /**
     * Получает все комментарии к указанной статье
     * Комментарии сортируются по дате создания в порядке убывания
     * @param int $articleId ID статьи
     * @return array Массив объектов Comment
     */
    public static function findAllByArticleId(int $articleId): array
    {
        $dbConnection = Db::getInstance();
        $sqlQuery = 'SELECT * FROM `'.static::getTableName().'` 
                WHERE `article_id` = :article_id 
                ORDER BY `created_at` DESC';
        $queryResult = $dbConnection->query($sqlQuery, [':article_id' => $articleId], static::class);
        return $queryResult ?: [];
    }

    /**
     * Возвращает имя таблицы в базе данных, с которой работает модель
     * @return string Имя таблицы 'comments'
     */
    protected static function getTableName(): string
    {
        return 'comments';
    }
}