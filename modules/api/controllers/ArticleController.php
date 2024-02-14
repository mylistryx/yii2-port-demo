<?php

namespace app\modules\api\controllers;

use app\components\controllers\ApiActiveController;
use app\models\Article;
use app\models\ArticleSearch;
use Yii;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\rest\IndexAction;

final class ArticleController extends ApiActiveController
{
    public $modelClass = ArticleSearch::class;

    public function extraActions(): array
    {
        $actions['index']['dataFilter'] = [
            'class'        => ActiveDataFilter::class,
            'searchModel'  => $this->modelClass,
            'attributeMap' => [
                'authorFilter'   => '{{author}}.[[name]]',
                'categoryFilter' => '{{category}}.[[title]]',
            ],
        ];
        $actions['index']['prepareDataProvider'] = function (IndexAction $action) {
            $query = $this->modelClass::find()->joinWith('author')->joinWith('categories');
            $query->andWhere($action->dataFilter->build());

            return new ActiveDataProvider([
                'query' => $query,
            ]);
        };
        return $actions;
    }
}