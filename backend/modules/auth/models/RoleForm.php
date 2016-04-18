<?php

namespace backend\modules\auth\models;

use Yii;


class RoleForm extends ItemForm
{

    public function init()
    {
        parent::init();
        $this->type = \yii\rbac\Item::TYPE_ROLE;
    }
}
