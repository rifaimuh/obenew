<?php

namespace backend\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SoalUjian as SoalUjianModel;
use Yii;

/**
 * RefMataKuliah represents the model behind the search form of `backend\models\RefMataKuliah`.
 */
class SoalUjian extends SoalUjianModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['jenis_data', 'file', 'created_at', 'updated_at', 'created_user', 'updated_user'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
		$jk = Yii::$app->getRequest()->getQueryParam('jk');
        $query = SoalUjianModel::find()->where(["id_ref_mata_kuliah"=>$jk]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jenis_data', $this->jenis_data])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'updated_user', $this->updated_user]);

        return $dataProvider;
    }
}
