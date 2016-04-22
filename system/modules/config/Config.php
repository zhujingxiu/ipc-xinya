<?php

namespace system\modules\config;
use Yii;

class Config extends \system\libs\base\BaseComponent
{
    public function get($code)
    {
        if(!$code) return ;

        $config = \system\modules\config\models\Config::find()->where(['code' => $code])->one();

        if($config)
            return $config->value;
        else
            return ;
    }

}
