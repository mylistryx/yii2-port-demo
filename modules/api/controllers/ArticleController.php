<?php

namespace app\modules\api\controllers;

use app\models\ArticleSearch;
use Yii;
use yii\data\DataProviderInterface;
use yii\web\Controller;

final class ArticleController extends Controller
{
    public function actionIndex(): DataProviderInterface
    {
        $searchModel = new ArticleSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}