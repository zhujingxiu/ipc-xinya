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

}
