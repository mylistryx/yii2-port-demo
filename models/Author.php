<?php

namespace app\models;

use BadFunctionCallException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $birthday
 * @property string $biography
 * @property-read $articles
 */
class Author extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%author}}';
    }

    public function attributeLabels(): array
    {
        return [
            'name'      => 'Имя',
            'birthday'  => 'Дата рождения',
            'biography' => 'Биография',
        ];
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
            ['name', 'string', 'length' => [3, 255]],
            ['birthday', 'date', 'format' => 'php:Y-m-d'],
            ['biography', 'string'],
        ];
    }

    public function getArticles(): ActiveQuery
    {
        return $this->hasMany(Article::class, ['author_id' => 'id']);
    }

    public function beforeDelete(): bool
    {
        if ($this->getArticles()->count()) {
            throw new BadFunctionCallException('Unlink articles first');
        }

        return true;
    }
}