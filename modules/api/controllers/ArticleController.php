<?php

namespace app\modules\api\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

final class ArticleController extends Controller
{
    public function actionIndex(): array
    {
        $searchModel = new ArticleSearch();
        return $searchModel->search(Yii::$app->request->bodyParams)->getModels();
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): Article
    {
        return Article::findOne($id) ?? throw new NotFoundHttpException();
    }
}