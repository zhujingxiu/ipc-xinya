<?php

namespace ipc\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\models\ProjectGuarantor;

/**
 * ProjectGuarantorSearch represents the model behind the search form about `ipc\modules\project\models\ProjectGuarantor`.
 */
class GuarantorSearch extends ProjectGuarantor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'status'], 'integer'],
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
        $query = ProjectGuarantor::find();

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
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
