<?php

namespace backend\controllers;

use backend\models\RefDosen;
use backend\models\RefMahasiswa;
use backend\models\RefMataKuliah;
use backend\models\RefTahunAjaran;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use backend\models\User as ModelsUser;
use common\models\User;
use app\models\UploadImageForm;
use app\models\UploadBapForm;
use app\models\UploadSoalForm;
use app\models\FileDatabase;
use app\models\FileBap;
use app\models\FileSoal;
use app\models\MataKuliahTayang;
use yii\web\UploadedFile;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use backend\controllers\SoalUjian;
use backend\models\SoalUjian as SoalUjianModel;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionUploadImage() {
		$jk = Yii::$app->getRequest()->getQueryParam('jk');
        $model = new UploadImageForm();
        if (Yii::$app->request->isPost) {
           $model->image = UploadedFile::getInstance($model, 'image');
           if ($model->upload()) {
			   
			   $data = new FileDatabase();
			   $data->id_mata_kuliah_tayang = $jk; //$decrypt;
			   $data->base_name = $model->image->baseName; //$model->file[0]->baseName;
			   $data->file_name = $model->image->baseName; //$nama;
			   $data->status = 1;
			   /*$data->created_at = '2020-07-05 09:45:21';
			   $data->updated_at = '2021-02-12 12:42:13';*/
			   $data->created_user = 'administrator';
			   $data->updated_user = 'administrator';
			   $data->save();
			   
			   /*$nama = 'rps_' .
               $mata_kuliah->nama . '_' .

                $path = Yii::getAlias("@backend/uploads/file_rps");
                $base = "{$path}/{$nama}.pdf";
                @unlink($base);
                // echo "<pre>";
                // print_r($base);
                // exit;
                $files = $model->file[0]->saveAs($base, FALSE);
                if ($files) {
                    $flag = true;
                    $newData = false;
                    $data = $exist = UploadImageForm::findOne(['id_mata_kuliah_tayang' => $decrypt]);
                    if (!$data) {
                        $newData = true;
                        $data = new UploadImageForm();
                    }
                    if ($update || $newData) {
                        $data->id_mata_kuliah_tayang = $decrypt;
                        $data->file_name = $nama;
                        $data->base_name = $model->file[0]->baseName;
                        $flag = $flag && $data->save(FALSE);
                        if ($update && $exist) {
                        }
                    }
                }

			$model->file = null;
        return $this->render('index', [
            'model'  => $model,
            'update' => $update,
        ]);*/
              // file is uploaded successfully
              echo "File successfully uploaded";
              return;
           }
        }
        return $this->render('upload', ['model' => $model]);
     }
	 
	 public function actionFile () {
		 $jk = Yii::$app->getRequest()->getQueryParam('jk');
		 $data = FileDatabase::find()->where(['id_mata_kuliah_tayang'=>$jk])->one();
		 $file = $data->file_name;
		 
		 
		 $completePath = '../uploads/file_rps/'.$file.'.pdf';
		 $filename = $file . '.pdf';
		 return Yii::$app->response->sendFile($completePath , $filename, ['inline'=>true]);
	 }
	 
	 public function actionUploadBap() {
		$jk = Yii::$app->getRequest()->getQueryParam('jk');
        $model = new UploadBapForm();
        if (Yii::$app->request->isPost) {
           $model->image = UploadedFile::getInstance($model, 'image');
           if ($model->upload()) {
			   
			   $data = new FileBap();
			   $data->id_mata_kuliah_tayang = $jk; //$decrypt;
			   $data->base_name = $model->image->baseName; //$model->file[0]->baseName;
			   $data->file_name = $model->image->baseName; //$nama;
			   $data->status = 1;
			   /*$data->created_at = '2020-07-05 09:45:21';
			   $data->updated_at = '2021-02-12 12:42:13';*/
			   $data->created_user = 'administrator';
			   $data->updated_user = 'administrator';
			   $data->save();
              // file is uploaded successfully
              echo "File successfully uploaded";
              return;
           }
        }
        return $this->render('bap', ['model' => $model]);
     }
	 
	 public function actionFile2 () {
		 $jk = Yii::$app->getRequest()->getQueryParam('jk');
		 $data = FileBap::find()->where(['id_mata_kuliah_tayang'=>$jk])->one();
		 $file = $data->file_name;
		 
		 
		 $completePath = '../uploads/file_bap/'.$file.'.pdf';
		 $filename = $file . '.pdf';
		 return Yii::$app->response->sendFile($completePath , $filename, ['inline'=>true]);
	 }
	 
	 public function actionUploadSoal() {
		$jk = Yii::$app->getRequest()->getQueryParam('jk');
        $model = new UploadSoalForm();
		$model2 = new SoalUjianModel();
        if (Yii::$app->request->isPost) {
           $model->image = UploadedFile::getInstance($model, 'image');
           if ($model->upload()) {
			   $data = new FileSoal();
			   $data->id_mata_kuliah_tayang = $jk; //$decrypt;
			   $data->jenis = $model2->jenis_data;
			   $data->base_name = $model->image->baseName; //$model->file[0]->baseName;
			   $data->file_name = $model->image->baseName; //$nama;
			   $data->status = 1;
			   /*$data->created_at = '2020-07-05 09:45:21';
			   $data->updated_at = '2021-02-12 12:42:13';*/
			   $data->created_user = 'administrator';
			   $data->updated_user = 'administrator';
			   $data->save();
              // file is uploaded successfully
              echo "File successfully uploaded";
              return;
           }
        }
        return $this->render('soal', ['model' => $model, 'model2' => $model2]);
     }
	 
	 public function actionFile3 () {
		 $jk = Yii::$app->getRequest()->getQueryParam('jk');
		 $data = FileSoal::find()->where(['id_mata_kuliah_tayang'=>$jk])->one();
		 $file = $data->file_name;
		 
		 
		 $completePath = '../uploads/file_soal/'.$file.'.pdf';
		 $filename = $file . '.pdf';
		 return Yii::$app->response->sendFile($completePath , $filename, ['inline'=>true]);
	 }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('site/login');
        } else {
            $data['all'] = RefMahasiswa::find()
                ->where(['not in', 'status', 0])
                ->count();
            $data['dosen'] = RefDosen::find()
                ->where(['not in', 'status', 0])
                ->count();
            $data['mk'] = RefMataKuliah::find()
                ->where(['not in', 'status', 0])
                ->count();
            $data['tahun'] = RefTahunAjaran::find()
                ->where(['not in', 'status', 0])
                ->count();
            $data['admin'] = User::find()
                ->where(['not in', 'status', 0])
                ->count();
            // echo '<pre>';
            // print_r($data);
            // exit;
            return $this->render('index', [
                'data' => $data,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Anda Berhasil Login');
            return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            // echo '<pre>';
            // print_r($model);
            // exit;
            Yii::$app->session->setFlash('warning', 'Please Check Your Email !!');
            Yii::$app->session->setFlash('success', 'Thank you for registration.');
            return $this->goHome();
        }
        // return $this->redirect('../../../frontend/web/site/signup');
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'Anda Berhasil Logout');
        return $this->goHome();
    }

    public function actionSetAssign()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $assign = Yii::$app->request->post('assign');
        Yii::$app->assign->setAssign($assign);

        return $this->redirect(['/site']);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionProfile()
    {   
        return $this->render('profile');
    }
}
