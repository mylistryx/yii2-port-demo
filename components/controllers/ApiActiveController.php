<?php

namespace app\components\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

abstract class ApiActiveController extends ActiveController
{
    /**
     * @throws BadRequestHttpException
     */
    public function beforeAction($action): bool
    {
        $response = parent::beforeAction($action);
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->formatters = [
            Response::FORMAT_JSON => [
                'class'       => JsonResponseFormatter::class,
                'prettyPrint' => YII_ENV_DEV,
            ],
        ];
        return $response;
    }

    public function actions(): array
    {
        return ArrayHelper::merge(parent::actions(), $this->extraActions());
    }

    public function extraActions(): array
    {
        return [];
    }
}