<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

class CategorySearch extends Category
{
    public function rules(): array
    {
        return [
            ['id', 'integer'],
            ['title', 'string'],
            ['description', 'string'],
        ];
    }

    public function search(?array $params = []): DataProviderInterface
    {
        $query = Category::find();
        $query->with('parent');
        $query->with('leaves');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'parent_id' => SORT_ASC,
                    'level'     => SORT_ASC,
                    'id'        => SORT_ASC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['LIKE', 'title', $this->title]);
        $query->andFilterWhere(['LIKE', 'description', $this->description]);

        return $dataProvider;
    }
}