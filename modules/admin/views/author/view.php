<?php
/**
 * @var View $this
 * @var Author $model
 */

use app\models\Author;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = 'View author with ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view-article">
    <?= DetailView::widget([
        'model' => $model,
    ]) ?>
</div>
