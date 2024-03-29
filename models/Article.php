<?php

namespace app\models;

use Throwable;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $announce
 * @property string $content
 * @property int $author_id
 * @property-read Author $author
 * @property-read array|Category[] $categories
 * @property-read array|ArticleCategory[] $articleCategories
 * @property-read array $allowedCategories
 * @property-read array $authorsList
 */
class Article extends ActiveRecord
{
    public array $linkedCategories = [];
    public mixed $uploadedFile = null;

    public function init()
    {

    }
    public static function tableName(): string
    {
        return '{{%article}}';
    }

    public function attributeLabels(): array
    {
        return [
            'title'        => 'Название',
            'uploadedFile' => 'Картинка',
            'image'        => 'Картинка',
            'announce'     => 'Анонс',
            'content'      => 'Текст',
            'author_id'    => 'Автор',
            'author'       => 'Автор',
            'categories'   => 'Категории',
        ];
    }

    public function rules(): array
    {
        return [
            [['title', 'announce', 'content', 'author_id', 'linkedCategories'], 'required'],
            ['author_id', 'exist', 'targetClass' => Author::class, 'targetAttribute' => 'id'],
            ['announce', 'string'],
            ['content', 'string'],
            ['linkedCategories', 'each', 'rule' => ['exist', 'targetClass' => Category::class, 'targetAttribute' => 'id']],
            ['uploadedFile', 'file', 'extensions' => ['png', 'gif', 'jpg']],
        ];
    }

    public function getAuthor(): ActiveQuery
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    public function getCategories(): ActiveQuery
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('articleCategories');
    }

    public function getArticleCategories(): ActiveQuery
    {
        return $this->hasMany(ArticleCategory::class, ['article_id' => 'id']);
    }

    public static function getAuthorsList(): array
    {
        return ArrayHelper::map(Author::find()->all(), 'id', 'name');
    }

    public function getAllowedCategories(): array
    {
        return ArrayHelper::map(Category::find()->all(), 'id', 'title');
    }

    public function afterFind(): void
    {
        $this->linkedCategories = ArrayHelper::getColumn($this->categories, 'id');
    }

    public function save($runValidation = true, $attributeNames = null): bool
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            /** Костылик. Исключительно для демки! */
            if ($uploadedFile = UploadedFile::getInstance($this, 'uploadedFile')) {
                $filename = md5(time()) . '.' . $uploadedFile->extension;
                if ($uploadedFile->saveAs(Yii::getAlias('@webroot' . '/images/' . $filename))) {
                    $this->image = $filename;
                }
            }

            if (parent::save($runValidation, $attributeNames)) {
                $this->unlinkAll('categories', true);
                foreach ($this->linkedCategories as $category) {
                    $this->link('categories', Category::findOne($category));
                }
                $transaction->commit();
                return true;
            }
        } catch (Throwable $e) {
        }
        $transaction->rollBack();
        return false;
    }

    public function afterDelete(): void
    {
        parent::afterDelete();
        try {
            $path = Yii::getAlias('@webroot') . '/images/' . $this->image;
            $path = FileHelper::normalizePath($path);
            FileHelper::unlink($path);
        } catch (Throwable) {
        }
    }
}