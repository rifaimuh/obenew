<?php

use backend\models\FileUpload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;



/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\RefKelas */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Acara Perkuliahan';
$this->params['breadcrumbs'][] = $this->title;
$jk = Yii::$app->getRequest()->getQueryParam('jk');
$url = Url::to(['', 'update' => $update, 'jk' => $jk]);
$urlOn = Url::to(['', 'update' => 1, $update, 'jk' => $jk]);
$urlOf = Url::to(['', 'update' => 0, $update, 'jk' => $jk]);

?>

<div class="import-nilai-index panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><strong> Berita Acara Perkuliahan</strong></h1>
    </div>

    <div class="panel-body">
        <p>
            <?php /*echo Html::a('<i class="fa fa-download"></i> Template Excel', ['download-template', 'jk' => $jk], [
                'class' => 'btn btn-success btn-flat',
                 'role' => 'modal-remote',
            ])*/ ?>
            <?php
            if (FileUpload::findOne(['id_mata_kuliah_tayang' => $jk ])) {
                echo Html::a('<i class="fa fa-eye"></i> Lihat File Upload', ['/upload/file_bap', 'jk' => $jk], [
                    'class' => 'btn btn-primary btn-flat',
                ]);
            }
            ?>
        </p>
        <!--<span style="font-size: 12px;">Jika Data Sudah Ada :</span>-->
        <?php /*echo SwitchInput::widget([
            'name'          => 'update',
            'value'            => $update,
            'pluginOptions' => [
                'size'     => 'small',
                'onText'   => 'Perbarui',
                'offText'  => 'Lewati',
                'onColor'  => 'danger',
                'offColor' => 'primary',
            ],
            'pluginEvents' => [
                'switchChange.bootstrapSwitch' => "function(e, s) {
					if (s) {
						$('#form-main').attr('action', '$urlOn');
					} else {
						$('#form-main').attr('action', '$urlOf');
					}
				}",
            ],
        ]); */?>

        <?php $form = ActiveForm::begin([
            'id'      => 'form-main',
            'action'  => $url,
            'options' => [
                'enctype' => 'multipart/form-data',
            ]
        ]) ?>
        
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
		<?= $form->field($model, 'file')->fileInput() ?>
			<button>Submit</button>
		<?php ActiveForm::end() ?>
        <?php ActiveForm::end() ?>
    </div>
</div>