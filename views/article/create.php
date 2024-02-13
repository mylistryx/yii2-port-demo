<?php

/**
 * @var View $this
 * @var Article $model
 */

use app\models\Article;
use yii\web\View;

$this->title = 'Create article';
$this->params['breadcrumbs'][] = 'Articles';
$this->params['breadcrumbs'] = $this->title;
?>
<div class="create-article">
    <h1><?= $this->title ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
