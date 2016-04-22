<?php

namespace ipc\modules\auth\models;

use ipc\modules\auth\Module;
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
            'name' => Module::t('auth','Name'),
            'type' => Module::t('auth','Type'),
            'description' => Module::t('auth', 'Description'),
            'rule_name' => Module::t('auth', 'Rule Name'),
            'data' => Module::t('auth', 'Data'),
            'created_at' => Module::t('auth', 'Created At'),
            'updated_at' => Module::t('auth', 'Updated At'),
        ];
    }


}
