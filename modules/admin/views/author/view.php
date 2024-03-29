<?php
/**
 * @var View $this
 * @var Author $model
 */

use app\models\Article;
use app\models\Author;
use yii\bootstrap5\Html;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = 'View author with ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view-article">
    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
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
        ],
    ]) ?>
    <div class="row">
        <div class="col-12">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => ['btn', 'btn-info']]) ?>
            <?php
            if (!$model->getArticles()->count()):
                ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
