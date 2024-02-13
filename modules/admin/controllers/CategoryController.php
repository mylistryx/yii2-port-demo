<?php

namespace app\modules\admin\controllers;

use app\components\controllers\WebController;
use app\models\CategorySearch;
use Yii;
use yii\web\Response;

final class CategoryController extends WebController
{
    public function actionIndex(): Response
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}