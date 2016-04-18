<?php

namespace ipc\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\models\Company;

/**
 * CompanySearch represents the model behind the search form about `ipc\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'customer_id', 'addtime', 'user_id'], 'integer'],
            [['coperate', 'phone', 'address', 'product', 'bussiness', 'description'], 'safe'],
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
        $query = Company::find();

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
            'company_id' => $this->company_id,
            'customer_id' => $this->customer_id,
            'addtime' => $this->addtime,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'coperate', $this->coperate])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'bussiness', $this->bussiness])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
