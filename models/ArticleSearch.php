<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

/**
 * {@inheritDoc}
 */
class ArticleSearch extends Article
{
    public ?string $authorFilter = null;
    public ?string $categoryFilter = null;

    public function rules(): array
    {
        return [
            [['title'], 'string'],
            [['authorFilter', 'categoryFilter'], 'safe'],
        ];
    }

    public function search(?array $params = []): DataProviderInterface
    {
        $query = Article::find();
        $query->joinWith('author');
        $query->joinWith('categories');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'category.title', $this->categoryFilter]);
        $query->andFilterWhere(['like', 'author.name', $this->authorFilter]);

        return $dataProvider;
    }
}