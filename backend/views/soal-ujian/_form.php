<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-mata-kuliah-form">
<?php $jk = Yii::$app->getRequest()->getQueryParam('jk');?>
    <?php $form = ActiveForm::begin(); ?>
	<?php
    $jenis_data = [ 'Soal UTS' => 'Soal UTS' , 'Soal UAS' => 'Soal UAS' , 'Jawaban UTS' => 'Jawaban UTS' , 'Jawaban UAS' => 'Jawaban UAS' , 'Kunci UTS' => 'Kunci UTS' , 'Kunci UAS' => 'Kunci UAS' , 'Tugas' => 'Tugas' , 'Project' => 'Project' , 'Laporan' => 'Laporan' ];
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
	
	<?= $form->field($model, 'id_ref_mata_kuliah')->textInput(['maxlength' => true , 'value' => $jk ]) ?>


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