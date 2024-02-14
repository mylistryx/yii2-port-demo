<?php

namespace app\modules\api\controllers;

use app\components\controllers\ApiActiveController;
use app\models\Article;
use app\models\ArticleSearch;
use yii\data\ActiveDataFilter;

final class ArticleController extends ApiActiveController
{
    public $modelClass = Article::class;

    public function extraActions(): array
    {
        $actions['index']['dataFilter'] = [
            'class'       => ActiveDataFilter::class,
            'searchModel' => ArticleSearch::class,
        ];
        return $actions;
    }
}