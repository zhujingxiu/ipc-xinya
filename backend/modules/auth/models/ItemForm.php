<?php

namespace backend\modules\auth\models;

use system\libs\base\BaseModel;
use Yii;

/**

 */
class ItemForm extends BaseModel
{
    public $name;
    public $type;
    public $description;
    public $rule_name;
    public $data;
    public $create_at;
    public $update_at;

    public $child;

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['rule_name'],'default','value'=>null],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => RuleForm::className(), 'targetAttribute' => ['rule_name' => 'name']],
            [['child'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


}
