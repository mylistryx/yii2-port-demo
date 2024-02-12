<?php

namespace app\modules\api;

use yii\base\BootstrapInterface;
use yii\base\Module;

class ApiModule extends Module implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $rules = [];
        $urlManager = $app->getUrlManager();
        $urlManager->addRules($rules);
    }
}