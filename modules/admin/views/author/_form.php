<?php
/**
 * @var Author $model ;
 */

use app\models\Author;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<?php
$form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'birthday')->textInput(); ?>
<?= $form->field($model, 'biography')->textarea(); ?>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
]) ?>
<?php
ActiveForm::end(); ?>