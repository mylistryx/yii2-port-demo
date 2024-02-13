<?php
namespace app\components\controllers;

use yii\web\BadRequestHttpException;
use yii\web\Controller;

abstract class ApiController extends Controller
{
    /**
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $a = 1;
        parent::beforeAction($action);

    }
}