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
<div class="article-list">
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
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>

