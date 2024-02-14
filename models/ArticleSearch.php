<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

/**
 * {@inheritDoc}
 */
class ArticleSearch extends Article
{
    public function rules(): array
    {
        return [];
    }

    public function search(?array $params = []): DataProviderInterface
    {
        $query = Article::find();
        $query->with('author');
        $query->with('categories');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
        }

        $query->andFilterWhere(['id' => $this->id]);

        return $dataProvider;
    }
}