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
use yii\helpers\Url;
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
        'filterModel'  => $searchModel,
        'columns'      => [
            'id',
            [
                'attribute' => 'title',
                'format'    => 'html',
                'value'     => fn($model) => Html::a($model->title, ['view', 'id' => $model->id]),
            ],
            [
                'attribute' => 'image',
                'format'    => 'raw',
                'value'     => function ($model) {
                    /** @var Article $model */
                    return Html::img(Url::toRoute('@web' . '/images/' . $model->image), [
                        'alt'   => null,
                        'style' => 'width:100px;',
                    ]);
                },
            ],
            'content',
            [
                'attribute' => 'author',
                'filterAttribute' => 'authorFilter',
                'format'    => 'html',
                'value'     => fn($model) => Html::a($model->author->name, ['author/view', 'id' => $model->author->id]),
            ],
            [
                'attribute'       => 'categories',
                'filterAttribute' => 'categoryFilter',
                'format'          => 'html',
                'value'           => function ($model) {
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

