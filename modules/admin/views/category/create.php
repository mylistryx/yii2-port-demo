<?php

/**
 * @var View $this
 * @var Author $model
 */

use app\models\Author;
use yii\web\View;

$this->title = 'Add new author';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-article">
    <h1><?= $this->title ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
