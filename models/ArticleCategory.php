<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $article_id
 * @property int $category_id
 * @property-read Article $article
 * @property-read Category $category
 */
class ArticleCategory extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%article_category}}';
    }

    public function getArticle(): ActiveQuery
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}