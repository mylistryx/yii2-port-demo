<?php

namespace app\modules\api\controllers;

use app\models\CategorySearch;
use Yii;
use yii\data\DataProviderInterface;
use yii\web\Controller;

final class CategoryController extends Controller
{
    public function actionIndex(): DataProviderInterface
    {
        $searchModel = new CategorySearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}