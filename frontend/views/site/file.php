<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/26/2017
 * Time: 4:06 PM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FlashCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flash-card-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => '255']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'content')->checkbox() ?>
    <?= $form->field($model, 'title')->dropDownList([
        'prompt' => 'Select a item',
        '1' => 'PHP',
        '2' => 'Yii2'
    ]) ?>
    <?=$form->field($model,'title')->fileInput()?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
