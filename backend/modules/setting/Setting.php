<?php

namespace backend\modules\setting;
use Yii;

class Setting extends \system\libs\base\BaseComponent
{
    public function get($code)
    {
        if(!$code) return ;

        $setting = \backend\modules\setting\models\Setting::find()->where(['code' => $code])->one();

        if($setting)
            return $setting->value;
        else
            return ;
    }

}
