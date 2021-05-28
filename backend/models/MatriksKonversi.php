<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "ref_cpl".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $isi
 * @property string|null $isi_en
 * @property string|null $ringkasan
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_user
 * @property string|null $updated_user
 *
 * @property RelasiCpmkCpl[] $relasiCpmkCpls
 */
class MatriksKonversi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matriks_konversi';
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isi_lama', 'isi_baru'], 'string'],
            [['kode_lama', 'isi_lama', 'kode_baru', 'isi_baru'], 'required', 'message' => '{attribute} tidak boleh kosong'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_lama', 'kode_baru'], 'string', 'max' => 8],
            [['created_user', 'updated_user'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_lama' => 'Kode Lama',
            'isi_lama' => 'Isi Lama',
            'kode_baru' => 'Kode Baru',
            'isi_baru' => 'Isi Baru',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_user' => 'Created User',
            'updated_user' => 'Updated User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelasiCpmkCpls()
    {
        return $this->hasMany(RelasiCpmkCpl::className(), ['id_ref_cpl' => 'id']);
    }
}
