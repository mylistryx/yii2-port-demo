<?php

/**
 * @var View $this
 * @var DataProviderInterface $dataProvider
 * @var CategorySearch $searchModel
 */

use app\models\CategorySearch;
use yii\bootstrap5\Html;
use yii\data\DataProviderInterface;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-list">
    <div class="row">
        <div class="col-3">
            <?= Html::a('Create', ['create'], ['class' => ['btn', 'btn-primary']]) ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            'id',
            'title',
            'description',
            [
                'attribute' => 'parent',
                'format'    => 'html',
                'value'     => fn($model) => $model->parent_id ? Html::a($model->title, ['view', 'id' => $model->parent->id]) : null,
            ],
            [
                'attribute' => 'leaves',
                'format'    => 'html',
                'value'     => function ($model) {
                    $leaves = [];
                    foreach ($model->leaves as $leaf) {
                        $leaves[] = Html::a($leaf->title, ['view', 'id' => $leaf->id]);
                    }
                    return implode(', ', $leaves);
                },
            ],
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>

