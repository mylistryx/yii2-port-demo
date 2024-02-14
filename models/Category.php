<?php

namespace app\models;

use BadFunctionCallException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property int $id
 * @property null|int $parent_id
 * @property int $level
 * @property string $title
 * @property null|string $description
 * @property-read null|static $parent
 * @property-read static[] $leaves
 * @property-read array|Article[] $articles
 * @property-read array|ArticleCategory[] $articleCategories
 * @property-read array $availableParents
 */
class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%category}}';
    }

    public function attributeLabels(): array
    {
        return [
            'title'        => 'Название',
            'description'  => 'Описание',
            'parent.title' => 'Родительская категория',
            'leaves'       => 'Дочерние категории',
            'articles'     => 'Связанные статьи',
        ];
    }

    public function rules(): array
    {
        return [
            [['title', 'description'], 'required'],
            ['title', 'string'],
            ['description', 'string'],
            ['parent_id', 'exist', 'targetClass' => static::class, 'targetAttribute' => 'id', 'skipOnEmpty' => true],
        ];
    }

    public function beforeSave($insert): bool
    {
        $response = parent::beforeSave($insert);
        $this->level = $this->parent_id ? $this->parent->level + 1 : 1;
        return $response;
    }

    public function getParent(): ActiveQuery
    {
        return $this->hasOne(static::class, ['id' => 'parent_id']);
    }

    public function getLeaves(): ActiveQuery
    {
        return $this->hasMany(static::class, ['parent_id' => 'id']);
    }

    public function getArticles(): ActiveQuery
    {
        return $this->hasMany(Article::class, ['id' => 'article_id'])->via('articleCategories');
    }

    public function getArticleCategories(): ActiveQuery
    {
        return $this->hasMany(ArticleCategory::class, ['category_id' => 'id']);
    }

    public function getAvailableParents(): array
    {
        $query = static::find();
        if (!$this->isNewRecord) {
            $query->where(['!=', 'id', $this->id]);
        }
        return ArrayHelper::map($query->all(), 'id', 'title');
    }

    public function beforeDelete(): bool
    {
        parent::beforeDelete();
        if ($this->getLeaves()->count()) {
            throw new BadFunctionCallException('Remove category leaves first');
        }
        if ($this->getArticles()->count()) {
            throw new BadFunctionCallException('Unattach articles first');
        }

        return true;
    }
}