<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true])->label('Ссылка на видео') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
