<?php

namespace ipc\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\models\Assess;

/**
 * AssessSearch represents the model behind the search form about `ipc\modules\project\models\Assess`.
 */
class AssessSearch extends Assess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'due', 'tender', 'repayment', 'agent_a', 'agent_b', 'addtime', 'status', 'level', 'user_id', 'edittime'], 'integer'],
            [['project_sn', 'borrower', 'corporator', 'phone', 'company', 'address', 'product', 'bussiness', 'text', 'intent', 'source', 'ensure'], 'safe'],
            [['amount'], 'number'],
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
        $query = Assess::find();

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
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'due' => $this->due,
            'tender' => $this->tender,
            'repayment' => $this->repayment,
            'agent_a' => $this->agent_a,
            'agent_b' => $this->agent_b,
            'addtime' => $this->addtime,
            'status' => $this->status,
            'level' => $this->level,
            'user_id' => $this->user_id,
            'edittime' => $this->edittime,
        ]);

        $query->andFilterWhere(['like', 'project_sn', $this->project_sn])
            ->andFilterWhere(['like', 'borrower', $this->borrower])
            ->andFilterWhere(['like', 'corporator', $this->corporator])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'bussiness', $this->bussiness])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'intent', $this->intent])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'ensure', $this->ensure]);

        return $dataProvider;
    }
}
