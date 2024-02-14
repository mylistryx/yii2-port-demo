<?php
/**
 * @var View $this
 * @var Article $model
 */

use app\models\Article;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = 'View article ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view-article">
    <h1><?= $model->title ?></h1>
    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'title',
            [
                'attribute' => 'image',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return Html::img(Url::toRoute('@web' . '/images/' . $model->image), [
                        'alt' => null,
                    ]);
                },
            ],
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
        ],
    ]) ?>
    <div class="row">
        <div class="col-12">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => ['btn', 'btn-info']]) ?>

            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => ['btn', 'btn-danger'],
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]) ?>
        </div>
    </div>
</div>
