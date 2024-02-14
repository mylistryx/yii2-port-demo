<?php

namespace app\modules\api\controllers;

use app\components\controllers\ApiActiveController;
use app\models\Article;
use app\models\ArticleSearch;
use Yii;
use yii\data\ActiveDataFilter;

final class ArticleController extends ApiActiveController
{
    public $modelClass = ArticleSearch::class;

    public function extraActions(): array
    {
        $actions['index']['dataFilter'] = [
            'class'        => ActiveDataFilter::class,
            'searchModel'  => $this->modelClass,
            'attributeMap' => [
                'authorFilter'   => 'author.name',
                'categoryFilter' => 'category.filter',
            ],
        ];
        $actions['index']['prepareDataProvider'] = function () {
            return (new ArticleSearch())->search(Yii::$app->request->bodyParams);
        };
        return $actions;
    }
}