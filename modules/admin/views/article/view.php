<?php
/**
 * @var View $this
 * @var Article $model
 */

use app\models\Article;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = 'View article ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view-article">
    <?= DetailView::widget([
        'model' => $model,
    ]) ?>
</div>
