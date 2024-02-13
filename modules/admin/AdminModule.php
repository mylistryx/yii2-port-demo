<?php

namespace app\modules\admin;

use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\rest\UrlRule;
use yii\web\GroupUrlRule;

class AdminModule extends Module implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $rules = [
            new GroupUrlRule([
                'prefix' => 'admin/author',
                'rules'  => [
                    'create' => 'create',
                    'update' => 'update',
                    'delete' => 'delete',
                    'view'   => 'view',
                    ''       => 'index',
                ],
            ]),
        ];
        $urlManager = $app->getUrlManager();
        $urlManager->addRules($rules);
    }
}