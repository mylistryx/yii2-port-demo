<?php

/**
 * @var View $this
 * @var Author $model
 */

use app\models\Author;
use yii\web\View;

$this->title = 'Update author';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-article">
    <h1><?= $this->title ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
