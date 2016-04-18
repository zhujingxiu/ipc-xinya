<?php

namespace backend\modules\auth\models;

use Yii;


class PermissionForm extends ItemForm
{


    public function init()
    {
        parent::init();
        $this->type = \yii\rbac\Item::TYPE_PERMISSION;
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['rule_name'],'default','value'=>null],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => RuleForm::className(), 'targetAttribute' => ['rule_name' => 'name']],
            
        ];
    }
}
