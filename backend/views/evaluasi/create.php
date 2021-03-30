<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */

$this->title = 'Tambah Data Evaluasi';
$this->params['breadcrumbs'][] = ['label' => 'Referensi Evaluasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Mata Kuliah Baru</h1>
    </div>
    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>