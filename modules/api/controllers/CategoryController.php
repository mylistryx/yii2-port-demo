<?php

namespace app\modules\api\controllers;

use app\components\controllers\ApiActiveController;
use app\models\Category;
use app\models\CategorySearch;
use yii\data\ActiveDataFilter;

final class CategoryController extends ApiActiveController
{
    public $modelClass = Category::class;

    public function extraActions(): array
    {
        $actions['index']['dataFilter'] = [
            'class'       => ActiveDataFilter::class,
            'searchModel' => CategorySearch::class,
        ];
        return $actions;
    }
}