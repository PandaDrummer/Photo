<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Allphoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allphoto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'personal_id')->textInput() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
