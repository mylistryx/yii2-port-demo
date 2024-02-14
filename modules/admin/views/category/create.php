<?php

/**
 * @var View $this
 * @var Category $model
 */

use app\models\Category;
use yii\web\View;

$this->title = 'Add new category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-category">
    <h1><?= $this->title ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
