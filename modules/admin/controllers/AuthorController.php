<?php

namespace app\modules\admin\controllers;

use app\components\controllers\WebController;
use app\models\Author;
use app\models\AuthorSearch;
use BadFunctionCallException;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

final class AuthorController extends WebController
{
    public function actionIndex(): Response
    {
        $searchModel = new AuthorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate(): Response
    {
        $model = new Author();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->success('Article created')->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id): Response
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->success('Item updated')->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): Response
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete(int $id): Response
    {
        $model = $this->findModel($id);

        try {
            $model->delete();
            return $this->success('Item deleted')->redirect(['index']);
        } catch (BadFunctionCallException $e) {
            return $this->error($e->getMessage())->redirect(['view', 'id' => $model->id]);
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel(int $id): Author
    {
        return Author::findOne($id) ?? throw new NotFoundHttpException('The requested page does not exist.');
    }
}