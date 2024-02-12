<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $birthday
 * @property string $biography
 */
class Author extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%author}}';
    }

    public function attributeLabels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }
}