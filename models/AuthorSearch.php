<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

class AuthorSearch extends Author
{
    public function rules(): array
    {
        return [
            ['id', 'integer'],
            ['name', 'string'],
        ];
    }

    public function search(?array $params = []): DataProviderInterface
    {
        $query = Author::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['LIKE', 'name', $this->name]);

        return $dataProvider;
    }
}