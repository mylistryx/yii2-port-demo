<?php

/**
 * @var View $this
 * @var DataProviderInterface $dataProvider
 * @var AuthorSearch $searchModel
 */

use app\models\AuthorSearch;
use yii\bootstrap5\Html;
use yii\data\DataProviderInterface;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;

$this->title = 'Authors';
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
            'name',
            [
                'format'    => ['date', 'dd.MM.YYYY'],
                'attribute' => 'birthday',
            ],
            'biography',
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>

