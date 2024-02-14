<?php
/**
 * @var Article $model ;
 */

use app\models\Article;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;

?>
<?php
$form = ActiveForm::begin(); ?>
<?= $form->field($model, 'author')->dropDownList($model->authorsList) ?>
<?= $form->field($model, 'title')->textInput(); ?>
<?= $form->field($model, 'image')->fileInput(); ?>
<?= $form->field($model, 'announce')->textarea(); ?>
<?= $form->field($model, 'content')->textarea(); ?>
<?= $form->field($model, 'author_id')->dropDownList($model->authorsList) ?>
<?= $form->field($model, 'linkedCategories')->dropDownList(ArrayHelper::map($model->categories, 'id', 'title'), ['multiple' => true]) ?>
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
]) ?>
<?php
ActiveForm::end(); ?>