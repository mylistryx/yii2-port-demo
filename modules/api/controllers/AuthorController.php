<?php

namespace app\modules\api\controllers;

use app\models\AuthorSearch;
use Yii;
use yii\data\DataProviderInterface;
use yii\web\Controller;

final class AuthorController extends Controller
{
    public function actionIndex(): DataProviderInterface
    {
        $searchModel = new AuthorSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}