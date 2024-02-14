<?php

/**
 * @var View $this
 * @var DataProviderInterface $dataProvider
 * @var ArticleSearch $searchModel
 */

use app\models\Article;
use app\models\ArticleSearch;
use yii\data\DataProviderInterface;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Html;
use yii\web\View;

$this->title = 'Article list';
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
        'columns'      => [
            'id',
            'title',
            'image',
            'content',
            [
                'attribute' => 'author',
                'format'    => 'html',
                'value'     => fn($model) => Html::a($model->author->name, ['author/view', 'id' => $model->author->id]),
            ],
            [
                'attribute' => 'categories',
                'format'    => 'html',
                'value'     => function ($model) {
                    /** @var Article $model */
                    $categories = [];
                    foreach ($model->categories as $category) {
                        $categories[] = Html::a($category->title, ['category/view', 'id' => $category->id]);
                    }
                    return implode(', ', $categories);
                },
            ],
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>

