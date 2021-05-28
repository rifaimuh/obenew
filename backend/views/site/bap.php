<?php
   use yii\widgets\ActiveForm;
   use app\models\FileBap;
   use yii\helpers\Html;
   use yii\helpers\Url;
   
   $jk = Yii::$app->getRequest()->getQueryParam('jk');
   $this -> title = 'Berita Acara Perkuliahan';
?>
<div class="import-nilai-index panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><strong> Berita Acara Perkuliahan</strong></h1>
    </div>
<div class="panel-body">
        <p>
 <?php
            if (FileBap::findOne(['id_mata_kuliah_tayang' => $jk ])) {
                echo Html::a('<i class="fa fa-eye"></i> Lihat File Upload', ['file2', 'jk' => $jk], [
                    'class' => 'btn btn-primary btn-flat',
                ]);
            }
            ?>
<br>
<br>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<?= $form->field($model, 'image')->fileInput() ?>
   <button>Submit</button>
<?php ActiveForm::end() ?>
		</p>
		</div>
		</div>