<?php

namespace ipc\modules\project\modules\config\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\modules\config\models\Repayment;

/**
 * RepaymentSearch represents the model behind the search form about `ipc\modules\project\modules\config\models\Repayment`.
 */
class RepaymentSearch extends Repayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['repayment_id', 'status'], 'integer'],
            [['title', 'code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Repayment::find();

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
            'repayment_id' => $this->repayment_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
