<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-mata-kuliah-form">

    <?php $form = ActiveForm::begin(); ?>
	<?php
    $jenis_data = [ 'Soal UTS' , 'Soal UAS' , 'Jawaban UTS' , 'Jawaban UAS' , 'Kunci UTS' , 'Kunci UAS' , 'Tugas' , 'Project' , 'Laporan' ];
	echo $form->field($model, 'jenis_data')->widget(Select2::classname(), [
        'data' => $jenis_data,
        'options' => [
            'placeholder' => '- Pilih -'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>


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