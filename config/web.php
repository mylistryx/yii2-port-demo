<?php

use app\models\Identity;
use app\modules\admin\AdminModule;
use app\modules\api\ApiModule;
use yii\caching\FileCache;
use yii\debug\Module as DebugModule;
use yii\gii\Module as GiiModule;
use yii\log\FileTarget;
use yii\symfonymailer\Mailer;
use yii\web\UrlNormalizer;
use yii\web\UrlRule;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => [
        'log',
        'admin',
        'api',
    ],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules'    => [
        'api'   => [
            'class' => ApiModule::class,
        ],
        'admin' => [
            'class' => AdminModule::class,
        ],
    ],
    'components' => [
        'request'      => [
            'cookieValidationKey' => '5Xs2bS3VRnWXx55u0qwBEH8W-PN1S-a8',
        ],
        'cache'        => [
            'class' => FileCache::class,
        ],
        'user'         => [
            'identityClass'   => Identity::class,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => Mailer::class,
            'viewPath'         => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => $db,
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => [
                ''        => '/site/index',
                'about'   => '/site/about',
                'contact' => '/site/contact',
                'login'   => '/site/login',
                'logout'  => '/site/logout',
            ],
            'normalizer'          => [
                'class'  => UrlNormalizer::class,
                'action' => UrlNormalizer::ACTION_REDIRECT_PERMANENT,

                'normalizeTrailingSlash' => true,
            ],
            'suffix'              => null,
        ],
    ],
    'params'     => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => GiiModule::class,
    ];
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => DebugModule::class,
        'allowedIPs' => ['*'],
    ];
}

return $config;
