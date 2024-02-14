<?php
/**
 * @var View $this
 * @var Category $model
 */

use app\models\Category;
use yii\bootstrap5\Html;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = 'View category with ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="view-article">
    <h1><?= $this->title ?></h1>
    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'parent.title',
            [
                'attribute' => 'articles',
                'format'    => 'html',
                'value'     => function ($model) {
                    $articles = [];
                    foreach ($model->articles as $article) {
                        $articles[] = Html::a($article->title, ['article/view', 'id' => $article->id]);
                    }
                    return implode(', ', $articles);
                },
            ],
            [
                'attribute' => 'leaves',
                'format'    => 'html',
                'value'     => function ($model) {
                    $leaves = [];
                    foreach ($model->leaves as $leaf) {
                        $leaves[] = Html::a($leaf->title, ['category/view', 'id' => $leaf->id]);
                    }
                    return implode(', ', $leaves);
                },
            ],
        ],
    ]) ?>
    <div class="row">
        <div class="col-12">
            <?= Html::a('Update', ['category/update', 'id' => $model->id], ['class' => ['btn', 'btn-info']]) ?>
            <?php
            if (!$model->getLeaves()->count() && !$model->getArticles()->count()):
                ?>
                <?= Html::a('Delete', ['category/delete', 'id' => $model->id], [
                'class' => ['btn', 'btn-danger'],
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]) ?>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
