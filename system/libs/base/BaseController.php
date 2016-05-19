<?php
namespace system\libs\base;

use Yii;
use yii\base\NotSupportedException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\StringHelper;
use yii\web\Response;
use system\modules\auth\models\Role;
use system\modules\auth\models\Permission;
class BaseController extends \yii\web\Controller
{
    public $identity;
    public $permissions;
    public $publicRoute = [];

    public  function init(){
        parent::init();

        $this->identity = Yii::$app->user->identity;
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    public function beforeAction($action)
    {
        $route = Yii::$app->requestedRoute;
        $allowAccess = in_array($route, [
            '',
            'site/login',
            'site/logout'
        ]);
        if (!$allowAccess && $this->identity) {
            if ($this->identity->isRoot()) {
                $allowAccess = true;
            } else {
                // 权限验证
                foreach($this->identity->userRoles() as $roleId){
                    $_role = Role::find()->andWhere(['node_id'=>$roleId])->asArray()->one();
                    if(!empty($_role['is_root'])){
                        return true;
                    }
                    if(!empty($_role['sets'])){
                        $tmp = explode(",",$_role['sets']);
                        if(is_array($tmp) && count($tmp)){
                            foreach($tmp as $i){
                                $this->permissions[] = $i;
                            }
                        }
                    }
                }
                $curr = Permission::find()->andWhere(['mode'=>'permission','path'=>$route])->asArray()->one();
                $allowAccess = empty($curr['node_id']) ? 0 : in_array($curr['node_id'],$this->permissions) ;
            }

            if ($allowAccess === false) {
                $response = Yii::$app->response;
                $response->format = Response::FORMAT_JSON;
                $response->data = [
                    'success' => false,
                    'msg' => '权限不足',
                    'code' => 2,
                ];
                return false;
            } else if($allowAccess === 0) {
                return false;
            } else {
                return parent::beforeAction($action);
            }
        }

        return parent::beforeAction($action);
    }


    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }

    /**
     * 成功信息
     *
     * @param string $msg 消息
     * @param array|null $data 数据
     * @return array
     */
    public function renderSuccess($msg, $data = null)
    {
        $return = [
            'success' => true,
            'msg' => $msg,
        ];
        if (!is_null($data)) {
            $return['data'] = $data;
        }

        return $return;
    }

    /**
     * 失败信息
     *
     * @param string $msg 消息
     * @param array|null $data 数据
     * @return array
     */
    public function renderError($msg, $data = null)
    {
        $return = [
            'success' => false,
            'msg' => $msg,
        ];
        if (!is_null($data)) {
            $return['data'] = $data;
        }

        return $return;
    }

    /**
     * 响应json数据
     *
     * @param array $data 输出json数据
     * @return array
     */
    public function responseJson($data)
    {
        $response = \Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = $data;

        return $data;
    }

    /**
     * 输出消息
     *
     * @param int $code 返回码
     * @param string $msg 消息
     * @param array|null $data 数据
     * @param array $extraData 额外的数据只覆盖对应的key
     * @return array
     */
    public function output($code, $msg = null, $data = null, $extraData = [])
    {
        if (is_null($msg)) {
            $msg = '未知';
        }

        $return = [
            'success' => (boolean)$code,
            'msg' => $msg,
        ];
        if ($extraData) {
            $return = array_merge($return, $extraData);
        }
        if (!is_null($data)) {
            $return['data'] = $data;
        }

        return $this->responseJson($return);
    }

    /**
     * 成功信息
     *
     * @param string $msg 消息
     * @param array|null $data 数据
     * @param array $extraData 额外的数据只覆盖对应的key
     * @return array
     */
    public function success($msg = null, $data = null, $extraData = [])
    {
        $return = $this->output(1, $msg, $data, $extraData);

        return $this->responseJson($return);
    }

    /**
     * 成功输出数据
     *
     * @param array|null $data 数据
     * @param string $msg 消息
     * @param array $extraData 额外的数据只覆盖对应的key
     * @return array
     */
    public function successData($data, $msg = null, $extraData = [])
    {
        $return = $this->output(1, $msg, $data, $extraData);

        return $this->responseJson($return);
    }

    /**
     * 失败信息
     *
     * @param string $msg 消息
     * @param array|null $data 数据
     * @param array $extraData 额外的数据只覆盖对应的key
     * @return array
     */
    public function error($msg = null, $data = null, $extraData = [])
    {
        $return = $this->output(0, $msg, $data, $extraData);

        return $this->responseJson($return);
    }
}
