<?php

namespace system\modules\auth\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use system\modules\auth\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `system\modules\auth\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'parent_id', 'lft', 'rgt', 'lvl', 'icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'integer'],
            [['name', 'icon', 'mode', 'path'], 'safe'],
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
        $query = Menu::find();

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
            'node_id' => $this->node_id,
            'parent_id' => $this->parent_id,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'lvl' => $this->lvl,
            'icon_type' => $this->icon_type,
            'active' => $this->active,
            'selected' => $this->selected,
            'disabled' => $this->disabled,
            'readonly' => $this->readonly,
            'visible' => $this->visible,
            'collapsed' => $this->collapsed,
            'movable_u' => $this->movable_u,
            'movable_d' => $this->movable_d,
            'movable_l' => $this->movable_l,
            'movable_r' => $this->movable_r,
            'removable' => $this->removable,
            'removable_all' => $this->removable_all,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'mode', $this->mode])
            ->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
