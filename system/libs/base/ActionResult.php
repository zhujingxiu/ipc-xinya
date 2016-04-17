<?php
namespace system\libs\base;

use Yii;

class ActionResult extends \yii\base\Object
{

    public $controller;

    public $action;

    public $isExecuted = false;

    public $result;

    public function __toString()
    {
        return $this->result;
    }
}

