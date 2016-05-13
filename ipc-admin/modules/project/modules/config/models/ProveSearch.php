<?php

namespace ipc\modules\project\modules\config\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\modules\config\models\Prove;

/**
 * ProveSearch represents the model behind the search form about `ipc\modules\project\modules\config\models\Prove`.
 */
class ProveSearch extends Prove
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prove_id', 'order', 'credit', 'validity', 'addtime', 'user_id'], 'integer'],
            [['title', 'code', 'remark'], 'safe'],
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
        $query = Prove::find();

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
            'prove_id' => $this->prove_id,
            'order' => $this->order,
            'credit' => $this->credit,
            'validity' => $this->validity,
            'addtime' => $this->addtime,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
