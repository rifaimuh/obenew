<?php
   namespace app\models;
   use yii\base\Model;
   use Yii;
   use yii\behaviors\TimestampBehavior;
   use yii\db\Expression;
   class UploadBapForm extends Model {
	   
	   public static function tableName()
    {
        return 'file_bap';
    }
	
	   public function behaviors()
    {
        return [
            [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value'              => new Expression('NOW()'),
            ],
        ];
    }
      public $image;
      public function rules() {
         return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpg'],
         ];
      }
	  public function attributeLabels()
    {
        return [
            'image' => 'Upload File Pdf untuk BAP',
        ];
    }
      public function upload() {
         if ($this->validate()) {
            $this->image->saveAs('../uploads/file_bap/' . $this->image->baseName . '.' .
               $this->image->extension);
            return true;
         } else {
            return false;
         }
      }
   }
?>