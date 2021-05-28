<?php
   namespace app\models;
   use yii\base\Model;
   use Yii;
   use yii\behaviors\TimestampBehavior;
   use yii\db\Expression;
   class FileDatabase extends \yii\db\ActiveRecord {
	   
	   
	  public static function tableName()
    {
        return 'file_rps';
    }

      public function rules() {
         return [
			//[['status','id_mata_kuliah_tayang'], 'integer'],
            //[['id','id_mata_kuliah_tayang','status'], 'integer', 'max' => 11],
            [['file_name','base_name'], 'required'],
			//[['file_name', 'base_name', 'created_user', 'updated_user'], 'string', 'max' => 255],
            //[['id_mata_kuliah_tayang'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliahTayang::className(), 'targetAttribute' => ['id_mata_kuliah_tayang' => 'id']],
            //[['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpg'],
         ];
      }
	  public function attributeLabels()
    {
        return [
		
			//'id' => 'ID',
           // 'id_mata_kuliah_tayang' => 'Id Mata Kuliah Tayang',
            'base_name' => 'Base Name',
            'file_name' => 'File Name',
           // 'status' => 'Status',
           // 'created_at' => 'Created At',
           // 'updated_at' => 'Updated At',
           // 'created_user' => 'Created User',
            //'updated_user' => 'Updated User',
           // 'image' => 'Upload File Pdf untuk RPS',
        ];
    }
	
	  /*public function getMataKuliahTayang()
    {
        return $this->hasOne(MataKuliahTayang::className(), ['id' => 'id_mata_kuliah_tayang']);
    }*/
	
   }
?>