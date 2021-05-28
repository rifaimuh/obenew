<?php

namespace backend\controllers;

use backend\models\FileUpload;
use Yii;
use backend\models\Presensi;
use backend\models\searchs\Krs as KrsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use backend\models\searchs\RefKelas;
use backend\models\searchs\RefMataKuliah;
use backend\models\MataKuliahTayang;
use backend\models\RefDosen;
use backend\models\RefMahasiswa;
use backend\models\searchs\RefTahunAjaran;
use backend\models\SetupAplikasi;
use backend\models\UploadFileImporter;
use yii\helpers\Html;


/**
 * KrsController implements the CRUD actions for Krs model.
 */
class PresensiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Index digunakan untuk menampilkan dan memproses halaman untuk import KRS.
     * Jika terdapat data yang masuk maka code dibawah $model->load(Yii::$app->request->post() akan tereksekusi
     * Jika file terdapat datanya maka code dibawah $model->file akan tereksekusi
     * Mengambil data pada excel dan menyimpannya ke variabel $spreadsheetData dalam bentuk array
     * Mengambil beberapa value pada beberap sel excel yaitu fakultas, program studi, semester dan data enkripsi
     * Melakukan Decrypt pada data enkripsi
     * Mengambil beberapa data yang perlu ditampilkan dari database berdasarkan data decyprt
     * Membuat nama file
     * Menyimpan file yang diupload ke folder $path
     * Melakukan penyimpanan atau memperbarui nama file ke database
     * Mengirim data ke view
     */
    public function actionIndex($update = 0)
    {
        if (!(Yii::$app->getRequest()->getQueryParam('jk'))) {
            return $this->redirect([
                '/mata-kuliah-tayang',
            ]);
        }
        $model = new UploadFileImporter();
       

        $model->file = null;
        return $this->render('index', [
            'model'  => $model,
            'update' => $update,
        ]);
    }

    /**
     * Mendownload File yang diupload terakhir kali
     * @param integer $jk
     * Mengambil data file dari tabel FileUpload berdasarkan $jk
     * Mengambil file dari folder file_krs dengan nama dari database
     */
    /*public function actionFileUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $jk = Yii::$app->getRequest()->getQueryParam('jk');

        $data = FileUpload::findOne(['id_mata_kuliah_tayang' => $jk, 'jenis' => 'krs']);
        $file = Yii::getAlias("@backend/uploads/file_krs/{$data->file_name}.xlsx");
        if (file_exists($file)) {
            return Yii::$app->response->sendFile(
                $file,
                $data->file_name . '.xls'
            );
        }
    }*/

    /**
     * MELIHAT HASIL IMPORT YANG PERNAH DIUPLOAD
     * @param integer $jk
     * Mengambil beberapa data yang diperlukan dari database berdasarkan $jk
     * Mengambil data KRS mahasiswa dari tabel KRS berdasarkan $jk
     */

    /**
     * Menghapus mahasiswa berdasarkan $jk dan $js
     * @param integer $jk
     * @param integer $js
     * mencari data sesuai dengan id_ref_mahasiswa dan id_mata_kuliah_tayang pada tabel KRS
     * menghapus data yang ditemukan
     */

    /**
     * Displays a single Krs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * TIDAK DIGUNAKAN
     * Creates a new Krs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Krs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
	public function actionFileUpload() {
         if ($this->validate()) {
            $this->file->saveAs('../uploads/file_bap/' . $this->file->baseName . '.' .
               $this->file->extension);
            return true;
         } else {
            return false;
         }
      }

    /**
     * TIDAK DIGUNAKAN
     * Updates an existing Krs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('warning', [['Update', 'Data Berhasil Diperbarui']]);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * TIDAK DIGUNAKAN
     * Deletes an existing Krs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model) {
            $model->status  = 0;
            $model->save();
            Yii::$app->session->setFlash('erro', [['Delete', 'Data Berhasil Dihapus']]);
        }
        return $this->redirect(['index']);
    }

    /**
     * TIDAK DIGUNAKAN
     * Finds the Krs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Krs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Krs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
