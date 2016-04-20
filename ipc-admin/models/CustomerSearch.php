<?php

namespace ipc\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `ipc\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'approved', 'vip', 'addtime', 'status'], 'integer'],
            [['realname', 'phone', 'email', 'gender', 'birthday', 'idnumber'], 'safe'],
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
        $query = Customer::find();

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
            'customer_id' => $this->customer_id,
            'birthday' => $this->birthday,
            'approved' => $this->approved,
            'vip' => $this->vip,
            'addtime' => $this->addtime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'idnumber', $this->idnumber]);

        return $dataProvider;
    }
}
