<?php

namespace app\modules\api;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\rest\UrlRule;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

class ApiModule extends Module implements BootstrapInterface
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function bootstrap($app): void
    {
        $rules = [
            [
                'class'      => UrlRule::class,
                'controller' => ['api/article', 'api/category', 'api/author'],
                'only'       => ['index', 'view'],
            ],
        ];
        $urlManager = $app->getUrlManager();
        $urlManager->addRules($rules);
    }
}