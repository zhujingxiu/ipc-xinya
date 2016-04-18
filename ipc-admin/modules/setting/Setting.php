<?php

namespace ipc\modules\setting;
use Yii;

class Setting extends \system\libs\base\BaseComponent
{
    public function get($code)
    {
        if(!$code) return ;

        $setting = \ipc\modules\setting\models\Setting::find()->where(['code' => $code])->one();

        if($setting)
            return $setting->value;
        else
            return ;
    }

}
