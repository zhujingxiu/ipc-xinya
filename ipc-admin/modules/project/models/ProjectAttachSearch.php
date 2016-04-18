<?php

namespace ipc\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ipc\modules\project\models\ProjectAttach;

/**
 * ProjectAttachSearch represents the model behind the search form about `ipc\modules\project\models\ProjectAttach`.
 */
class ProjectAttachSearch extends ProjectAttach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attach_id', 'project_id', 'user_id', 'addtime', 'status'], 'integer'],
            [['mode', 'title', 'content'], 'safe'],
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
        $query = ProjectAttach::find();

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
            'attach_id' => $this->attach_id,
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'addtime' => $this->addtime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'mode', $this->mode])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
