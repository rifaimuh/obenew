<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMataKuliah */

$this->title = 'Update Evaluasi: ' . $model->evaluasi;
$this->params['breadcrumbs'][] = ['label' => 'Evaluasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->evaluasi, 'url' => ['view', 'id' => $model->id]];
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