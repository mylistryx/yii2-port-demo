<?php
/**
 * @var Category $model ;
 */

use app\models\Category;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<?php
$form = ActiveForm::begin(); ?>
<?= $form->field($model, 'parent_id')->dropDownList($model->availableParents, ['prompt' => 'Parent category']); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textarea(); ?>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
]) ?>
<?php
ActiveForm::end(); ?>