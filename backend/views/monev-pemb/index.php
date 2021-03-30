<?php

use backend\models\CapaianMahasiswa;
use backend\models\FileUpload;
use backend\models\Rps;
use backend\models\Krs;
use backend\models\Bap;
use backend\models\Presensi;
use backend\models\SoalUjian;
use backend\models\Nilai;
use backend\models\Evaluasi;
use backend\models\RefCpmk;
use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\Constraint\IsNull;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\MataKuliahTayang */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile("@web/js/sweetalert.js", [
    'depends' => ["yii\web\JqueryAsset"]
]);
$js      = <<< JS
function alert() {
   return Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href>Why do I have this issue?</a>'
    })
}

JS;
$this->registerJs($js);

$this->title = 'Monitoring dan Evaluasi Pembelajaran';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Tabel Data</h1>
    </div>
    
    <div class="panel-body">
        <?php
        if (Yii::$app->assign->is(["administrator"])) {
        ?>
            <p align="right">
                <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php
        }
        ?>
        <?php Pjax::begin(); ?>
        
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'class'     => 'yii\grid\DataColumn',      // can be omitted, as it is the default
                    'attribute' => 'id_tahun_ajaran',
                    'value'     => function ($dataProvider) {
                        return $dataProvider['tahunAjaran']->tahun; // $data['name'] for array data, e.g. using SqlDataProvider.
                    },
                ],
                'semester',
                [
                    'class'     => 'yii\grid\DataColumn',      // can be omitted, as it is the default
                    'attribute' => 'id_ref_mata_kuliah',
                    'value'     => function ($dataProvider) {
                        return $dataProvider['refMataKuliah']->nama; // $data['name'] for array data, e.g. using SqlDataProvider.
                    },
                ],
                [
                    'class'     => 'yii\grid\DataColumn',      // can be omitted, as it is the default
                    'attribute' => 'id_ref_kelas',
                    'value'     => function ($dataProvider) {
                        return $dataProvider['refKelas']->kelas; // $data['name'] for array data, e.g. using SqlDataProvider.
                    },
                ],

                [
                    'class'    => 'kartik\grid\ActionColumn',
					'options' => [
                        'style' => 'width: 500px',],
                    'template' => '{RPS} {Presensi} {BAP} {Ujian} {Nilai} {Evaluasi} {Portofolio} ',
                    'header'   => 'Portofolio',
                    'visible'  => !Yii::$app->assign->is(["dosen", "admin dosen"]),
                    'buttons'  => [
                        'RPS' => function ($url, $model, $key) {
                            if (Rps::findOne(['id_mata_kuliah_tayang' => $model->id])) {
                                $rps = Html::a(
                                    '<span> RPS</span>',
                                    ['/rps', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $rps = Html::a(
                                    '<i> RPS</i>',
                                    ['/rps', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$rps}
                            </div>";
                        },
						 'Presensi' => function ($url, $model, $key) {
                            if (Presensi::findOne(['id_mata_kuliah_tayang' => $model->id])) {
                                $presensi = Html::a(
                                    '<span> Presensi</span>',
                                    ['/presensi', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $presensi = Html::a(
                                    '<i> Presensi</i>',
                                    ['/presensi', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$presensi}
                            </div>";
                        },
						 'BAP' => function ($url, $model, $key) {
                            if (Bap::findOne(['id' => $model->id])) {
                                $bap = Html::a(
                                    '<span> BAP</span>',
                                    ['/bap', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $bap = Html::a(
                                    '<i> BAP</i>',
                                    ['/bap', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$bap}
                            </div>";
                        },
						  'Ujian' => function ($url, $model, $key) {
                            if (SoalUjian::findOne(['id' => $model->id])) {
                                $soalujian = Html::a(
                                    '<span> Soal Ujian</span>',
                                    ['/soal-ujian', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $soalujian = Html::a(
                                    '<i> Soal Ujian</i>',
                                    ['/soal-ujian', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$soalujian}
                            </div>";
                        },
						 'Nilai' => function ($url, $model, $key) {
                            if (Nilai::findOne(['id' => $model->id])) {
                                $nilai = Html::a(
                                    '<span> Nilai</span>',
                                    ['/nilai', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $nilai = Html::a(
                                    '<i> Nilai</i>',
                                    ['/nilai', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$nilai}
                            </div>";
                        },
						 'Evaluasi' => function ($url, $model, $key) {
                            if (Evaluasi::findOne(['id' => $model->id])) {
                                $evaluasi = Html::a(
                                    '<span> Evaluasi</span>',
                                    ['/evaluasi', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $evaluasi = Html::a(
                                    '<i> Evaluasi</i>',
                                    ['/evaluasi', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$evaluasi}
                            </div>";
                        },
						 'Portofolio' => function ($url, $model, $key) {
                            if (Krs::findOne(['id_mata_kuliah_tayang' => $model->id])) {
                                $krs = Html::a(
                                    '<span> Portofolio</span>',
                                    ['/krs', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $krs = Html::a(
                                    '<i> Portofolio</i>',
                                    ['/krs', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$krs}
                            </div>";
                        },
                    ],
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{all}',
                    'header'   => 'Import Nilai',
                    'visible' => !Yii::$app->assign->is(["administrator"]),
                    'buttons' => [
                        'all' => function ($url, $model, $key) {
                            if (!Krs::findOne(['id_mata_kuliah_tayang' => $model->id])) {
                                $nilai = Html::a(
                                    '<i class="glyphicon glyphicon-info-sign"> Nilai</i>',
                                    [''],
                                    [
                                        'class'        => 'btn-sm btn btn-danger',
                                        'title'        => 'Kartu Rencana Studi Belum di UPLOAD ADMINISTRATOR',
                                    ]
                                );
                            } else if (
                                CapaianMahasiswa::find()
                                ->joinWith(['refCpmk'])
                                ->where([CapaianMahasiswa::tableName() . '.tahun' => $model['tahunAjaran']->tahun])
                                ->andWhere([CapaianMahasiswa::tableName() . '.semester' => $model->semester])
                                ->andWhere([CapaianMahasiswa::tableName() . '.kelas' => $model['refKelas']->kelas])
                                ->andWhere([RefCpmk::tableName() . '.id_ref_mata_kuliah' => $model['refMataKuliah']->id])
                                ->one()
                            ) {
                                $nilai = Html::a(
                                    '<span class="glyphicon glyphicon-info-sign"> Nilai</span>',
                                    ['/data-utama', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-primary',
                                    ]
                                );
                            } else {
                                $nilai = Html::a(
                                    '<i class="glyphicon glyphicon-info-sign"> Nilai</i>',
                                    ['/data-utama', 'jk' => $model->id],
                                    [
                                        'class' => 'btn-sm btn btn-warning',
                                    ]
                                );
                            }
                            return "<div class='btn-group'>
                                {$nilai}
                            </div>";
                        },
                    ],
                ],


                // ['class' => 'yii\grid\ActionColumn'],
                /*[
                    'class'   => 'kartik\grid\ActionColumn',
                    'options' => [
                        'style' => 'min-width: 100px',
                    ],
                    'template' => '{view} {update} {delete}',
                    'dropdown' => false,
                    'vAlign'   => 'middle',
                    // 'urlCreator' => function($action, $model, $key, $index) {
                    //     $url = Url::to([$action, 'id' => $key]);
                    //     return $url;
                    // },
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<i class="fa fa-info-circle"></i>', $url, [
                                'data-original-title' => 'Lihat',
                                'title'               => 'Lihat',
                                'data-toggle'         => 'tooltip',
                                'class'               => 'btn btn-primary btn-xs',
                                // 'role'                => 'modal-remote',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            if (!CapaianMahasiswa::find()
                                ->joinWith(['refCpmk'])
                                ->where([CapaianMahasiswa::tableName() . '.tahun' => $model['tahunAjaran']->tahun])
                                ->andWhere([CapaianMahasiswa::tableName() . '.semester' => $model->semester])
                                ->andWhere([CapaianMahasiswa::tableName() . '.kelas' => $model['refKelas']->kelas])
                                ->andWhere([RefCpmk::tableName() . '.id_ref_mata_kuliah' => $model['refMataKuliah']->id])
                                ->one()) {
                                return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                    'data-original-title' => 'Perbarui',
                                    'title'               => 'Perbarui',
                                    'data-toggle'         => 'tooltip',
                                    'class'               => 'btn btn-warning btn-xs',
                                    // 'role'                => 'modal-remote',
                                ]);
                            }
                        },
                        'delete' => function ($url, $model) {
                            if (!CapaianMahasiswa::find()
                                ->joinWith(['refCpmk'])
                                ->where([CapaianMahasiswa::tableName() . '.tahun' => $model['tahunAjaran']->tahun])
                                ->andWhere([CapaianMahasiswa::tableName() . '.semester' => $model->semester])
                                ->andWhere([CapaianMahasiswa::tableName() . '.kelas' => $model['refKelas']->kelas])
                                ->andWhere([RefCpmk::tableName() . '.id_ref_mata_kuliah' => $model['refMataKuliah']->id])
                                ->one()) {
                                return Html::a('<i class="fa fa-trash"></i>', $url, [
                                    'data-original-title'  => 'Hapus',
                                    'title'                => 'Hapus',
                                    'data-toggle'          => 'tooltip',
                                    'class'                => 'btn btn-danger btn-xs',
                                    'role'                 => 'modal-remote',
                                    'data-confirm'         => false,
                                    'data-method'          => false, // for overide yii data api
                                    'data-request-method'  => 'post',
                                    'data-confirm-title'   => 'Konfirmasi',
                                    'data-confirm-message' => 'Apakah anda yakin akan menghapus data ini?',
                                ]);
                            }
                        }
                    ],
                    'visibleButtons' =>
                    [
                        'update' => Yii::$app->assign->is(["administrator"]),
                        'delete' => Yii::$app->assign->is(["administrator"]),
                    ]
                ],*/
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>