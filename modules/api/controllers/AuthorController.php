<?php

namespace app\modules\api\controllers;

use app\models\Author;
use app\models\AuthorSearch;
use Yii;
use yii\data\DataProviderInterface;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

final class AuthorController extends Controller
{
    public function actionIndex(): DataProviderInterface
    {
        $searchModel = new AuthorSearch();
        return $searchModel->search(Yii::$app->request->bodyParams);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): Author
    {
        return Author::findOne($id) ?? throw new NotFoundHttpException();
    }
}