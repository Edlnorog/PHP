<?php
namespace src\Models\Articles;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

/**
 * Класс Article представляет модель статьи в системе
 * Наследуется от ActiveRecordEntity для реализации паттерна Active Record
 * Обеспечивает работу с таблицей 'articles' в базе данных
 */
class Article extends ActiveRecordEntity
{
    /** @var string Название статьи */
    protected $name;
    
    /** @var string Текст содержимого статьи */
    protected $text;
    
    /** @var int Идентификатор автора статьи */
    protected $author_id;

    /**
     * Получает название статьи
     * @return string Название статьи
     */
    public function getName(): string 
    {
        return $this->name;
    }

    /**
     * Получает текст содержимого статьи
     * @return string Текст статьи
     */
    public function getText(): string 
    {
        return $this->text;
    }

    /**
     * Получает идентификатор автора статьи
     * @return int ID автора
     */
    public function getAuthorId(): int 
    {
        return $this->author_id;
    }
    
    /**
     * Получает объект автора статьи
     * Загружает связанный объект User из базы данных
     * @return User|null Объект автора или null, если автор не найден
     */
    public function getAuthor(): ?User 
    {
        if (!$this->author_id) {
            return null; 
        }
        return User::getById($this->author_id); //тут загружаем объект User через User::getById()
    }
    
    /**
     * Устанавливает название статьи
     * @param string $name Новое название статьи
     */
    public function setName(string $name): void 
    {
        $this->name = $name;
    }

    /**
     * Устанавливает текст содержимого статьи
     * @param string $text Новый текст статьи
     */
    public function setText(string $text): void 
    {
        $this->text = $text;
    }

    /**
     * Устанавливает идентификатор автора статьи
     * @param int $authorId ID автора
     */
    public function setAuthorId(int $authorId): void 
    {
        $this->author_id = $authorId;
    }

    /**
     * Возвращает имя таблицы в базе данных, с которой работает модель
     * @return string Имя таблицы 'articles'
     */
    public static function getTableName(): string // здесь мы указываем, с какой таблицей работает модель 
    {
        return 'articles';
    }
}