<?php

namespace app\modules\api\controllers;

use app\components\controllers\ApiActiveController;
use app\models\Author;
use app\models\AuthorSearch;
use Yii;
use yii\data\ActiveDataFilter;

final class AuthorController extends ApiActiveController
{
    public $modelClass = Author::class;

    public function extraActions(): array
    {
        $actions['index']['dataFilter'] = [
            'class'       => ActiveDataFilter::class,
            'searchModel' => AuthorSearch::class,
        ];
        return $actions;
    }
}