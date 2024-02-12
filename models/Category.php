<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property-read static $parent
 * @property-read static[] $leaves
 */
class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%category}}';
    }

    public function attributeLabels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }

    public function getParent(): ActiveQuery
    {
        return $this->hasOne(static::class, ['id' => 'parent_id']);
    }

    public function getLeaves(): ActiveQuery
    {
        return $this->hasMany(static::class, ['parent_id' => 'id']);
    }
}