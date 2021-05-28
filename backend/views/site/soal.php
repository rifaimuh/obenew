<?php
   use yii\widgets\ActiveForm;
   use app\models\FileSoal;
   use yii\helpers\Html;
   use yii\helpers\Url;
   use kartik\widgets\Select2;
   
   $jk = Yii::$app->getRequest()->getQueryParam('jk');
   $this -> title = 'Dokumentasi UAS, UTS, Tugas, Dll.';
?>
<div class="import-nilai-index panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><strong> Dokumentasi UAS, UTS, Tugas, Dll. </strong></h1>
    </div>
<div class="panel-body">
        <p>
		
 <?php $form = ActiveForm::begin(); ?>
 <?php
            if (FileSoal::findOne(['id_mata_kuliah_tayang' => $jk ])) {
                echo Html::a('<i class="fa fa-eye"></i> Lihat File Upload', ['file3', 'jk' => $jk], [
                    'class' => 'btn btn-primary btn-flat',
                ]);
            }
            ?>
	<br>
    <br>	
	<?php
    $jenis_data = [ 'Soal UTS' => 'Soal UTS' , 'Soal UAS' => 'Soal UAS' , 'Jawaban UTS' => 'Jawaban UTS' , 'Jawaban UAS' => 'Jawaban UAS' , 'Kunci UTS' => 'Kunci UTS' , 'Kunci UAS' => 'Kunci UAS' , 'Tugas' => 'Tugas' , 'Project' => 'Project' , 'Laporan' => 'Laporan' ];
	echo $form->field($model2, 'jenis_data')->widget(Select2::classname(), [
        'data' => $jenis_data,
        'options' => [
            'placeholder' => '- Pilih -'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

<?= $form->field($model, 'id_ref_mata_kuliah')->textInput(['maxlength' => true , 'value' => $jk ]) ?>
<?php ActiveForm::end() ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<?= $form->field($model, 'image')->fileInput() ?>
   <button>Submit</button>
<?php ActiveForm::end() ?>
		</p>
		</div>
		</div>