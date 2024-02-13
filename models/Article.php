<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $announce
 * @property string $content
 * @property int $author_id
 * @property-read Author $author
 * @property-read array|Category[] $categories
 * @property-read array $authorsList
 */
class Article extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%article}}';
    }

    public function attributeLabels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }

    public function getAuthor(): ActiveQuery
    {
        return $this->hasOne(Author::class, ['id' => 'parent_id']);
    }

    public function getCategories(): ActiveQuery
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('articleCategory');
    }

    public static function getAuthorsList(): array
    {
        return ArrayHelper::map(Author::find()->all(), 'id', 'name');
    }
}