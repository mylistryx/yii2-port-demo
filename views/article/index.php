<?php

/**
 * @var View $this
 * @var DataProviderInterface $dataProvider
 * @var ArticleSearch $searchModel
 */

use app\models\ArticleSearch;
use yii\data\DataProviderInterface;
use yii\grid\GridView;
use yii\web\View;

$this->title = 'Article list';
$this->params['breadcrumbs'][] = 'Articles';
$this->params['breadcrumbs'] = $this->title;
?>
<div class="article-list">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id', 'title', 'image', 'content', 'author.name', 'category.name',
        ],
    ]) ?>
</div>

