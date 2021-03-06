<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Krs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rps-form">
<?php $jk = Yii::$app->getRequest()->getQueryParam('jk');?>
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_ref_mahasiswa')->textInput() ?>

    <?= $form->field($model, 'id_mata_kuliah_tayang')->textInput() ?>
	
	<?= $form->field($model, 'id_ref_mata_kuliah')->textInput(['maxlength' => true , 'value' => $jk ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
