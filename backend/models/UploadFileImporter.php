<?php

/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 *
 */
class UploadFileImporter extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file' => 'Upload File Pdf untuk Berita Acara Perkuliahan',
        ];
    }
	public function upload() {
         if ($this->validate()) {
            $this->file->saveAs('../uploads/file_bap/' . $this->file->baseName . '.' .
               $this->file->extension);
            return true;
         } else {
            return false;
         }
      }
}
