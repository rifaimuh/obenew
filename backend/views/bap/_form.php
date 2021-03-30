<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-mata-kuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bahan_ajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::button(
            'Back',
            array(
                'name' => 'btnBack',
                'class' => 'btn btn-danger',
                'onclick' => "history.go(-1)",
            )
        ); ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>