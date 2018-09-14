<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cir;

/**
 * CirSearch represents the model behind the search form of `app\models\Cir`.
 */
class CirSearch extends Cir
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['drawing_no', 'cir_no', 'joint_no', 'method', 'result', 'complete_date', 'remarks'], 'safe'],
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
        $query = Cir::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['complete_date' => SORT_DESC]],
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
            'complete_date' => $this->complete_date,
        ]);

        $query->andFilterWhere(['like', 'drawing_no', $this->drawing_no])
            ->andFilterWhere(['like', 'cir_no', $this->cir_no])
            ->andFilterWhere(['like', 'joint_no', $this->joint_no])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
