<?php

namespace ipc\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `ipc\modules\project\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'project_sn', 'due', 'tender', 'repayment', 'addtime'], 'integer'],
            [['borrower', 'phone', 'company', 'address'], 'safe'],
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
        $query = Project::find();

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
            'project_sn' => $this->project_sn,
            'amount' => $this->amount,
            'due' => $this->due,
            'tender' => $this->tender,
            'borrower' => $this->borrower,
            'company' => $this->company,
            'repayment' => $this->repayment,
            'address' => $this->address,
            'addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'borrower', $this->borrower])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'company', $this->company]);

        return $dataProvider;
    }
}
