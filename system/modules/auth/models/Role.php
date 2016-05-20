<?php

namespace system\modules\auth\models;

use system\models\User;
use Yii;

/**
 * This is the model class for table "{{%auth_node}}".
 *
 * @property integer $node_id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property string $mode
 * @property string $path
 * @property string $rule
 * @property string $rule_param
 * @property string $sets
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class Role extends \system\modules\auth\models\Node
{
    const DEVELOPER = 'developer';
    const CREDIT = 'credit';
    const RISK = 'risk';
    const FINANCIAL = 'financial';
    const COMMITTEE = 'committee';
    const CHAIRMAN = 'chairman';

    public function init()
    {
        parent::init();
        $this->mode = parent::MODE_ROLE;
    }

    public static function getRole($value)
    {
        return Role::findOne(['path'=>strtolower($value)]);

    }

    public static function getRoleId($value){
        $role = self::getRole($value);

        if(empty($role['node_id'])){
            return false;
        }

        return $role['node_id'];
    }
}
