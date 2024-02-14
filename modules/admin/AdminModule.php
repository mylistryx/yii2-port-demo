<?php

namespace app\modules\admin;

use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\web\GroupUrlRule;

class AdminModule extends Module implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $crudPattern = [
            'create' => 'create',
            'update' => 'update',
            'delete' => 'delete',
            'view'   => 'view',
            ''       => 'index',
        ];

        $rules = [
            new GroupUrlRule([
                'prefix' => 'admin/author',
                'rules'  => $crudPattern,
            ]),
            new GroupUrlRule([
                'prefix' => 'admin/category',
                'rules'  => $crudPattern,
            ]),
            new GroupUrlRule([
                'prefix' => 'admin/article',
                'rules'  => $crudPattern,
            ]),
        ];
        $urlManager = $app->getUrlManager();
        $urlManager->addRules($rules);
    }
}