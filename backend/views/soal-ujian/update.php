<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */

$this->title = 'Update Data Ujian: ' . $model->jenis_data;
$this->params['breadcrumbs'][] = ['label' => 'Data Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_data, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Data</h1>
    </div>
    <div class="panel-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>