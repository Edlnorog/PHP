<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

/**
 * Класс User представляет модель пользователя в системе
 * Наследуется от ActiveRecordEntity для реализации паттерна Active Record
 * Обеспечивает работу с таблицей 'users' в базе данных
 */
class User extends ActiveRecordEntity
{
    /** @var string Никнейм пользователя */
    protected $nickname;
    
    /** @var string Email пользователя */
    protected $email;
    
    /** @var bool Статус подтверждения email */
    protected $isConfirmed;
    
    /** @var string Роль пользователя в системе */
    protected $role;
    
    /** @var string Хеш пароля пользователя */
    protected $passwordHash;
    
    /** @var string Токен авторизации */
    protected $authToken;
    
    /** @var string Дата и время регистрации */
    protected $createdAt;

    /**
     * Устанавливает никнейм пользователя
     * @param string $name Новый никнейм
     */
    public function setName(string $name): void 
    {
        $this->nickname = $name;
    }

    /**
     * Получает никнейм пользователя
     * @return string Текущий никнейм
     */
    public function getNickname(): string 
    {
        return $this->nickname;
    }

    /**
     * Получает имя пользователя (алиас для getNickname)
     * @return string Никнейм пользователя
     */
    public function getName(): string
    {
        return $this->nickname;
    }

    /**
     * Возвращает имя таблицы в базе данных, с которой работает модель
     * @return string Имя таблицы 'users'
     */
    protected static function getTableName(): string
    {
        return 'users';
    }
}