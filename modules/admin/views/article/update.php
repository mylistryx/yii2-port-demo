<?php

/**
 * @var View $this
 * @var Article $model
 */

use app\models\Article;
use yii\web\View;

$this->title = 'Update article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-article">
    <h1><?= $this->title ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
