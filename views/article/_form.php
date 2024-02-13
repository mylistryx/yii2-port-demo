<?php
/**
 * @var Article $model ;
 */

use app\models\Article;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'author')->dropDownList($model->authorsList) ?>
<?= $form->field($model, 'title')->textInput(); ?>
<?= $form->field($model, 'image')->fileInput(); ?>
<?= $form->field($model, 'announce')->textInput(); ?>
<?= $form->field($model, 'content')->textInput(); ?>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
]) ?>
<?php ActiveForm::end(); ?>