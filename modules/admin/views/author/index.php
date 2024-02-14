<?php

/**
 * @var View $this
 * @var DataProviderInterface $dataProvider
 * @var AuthorSearch $searchModel
 */

use app\models\Article;
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
            [
                'attribute' => 'articles',
                'format'    => 'html',
                'value'     => function ($model) {
                    $articles = [];
                    /** @var Article $article */
                    foreach ($model->articles as $article) {
                        $articles[] = Html::a($article->title, ['article/view', 'id' => $model->id]);
                    }

                    return implode('<br>', $articles);
                },
            ],
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>

