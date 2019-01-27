<?php

namespace app\module\Admin\controllers;


use app\models\AdminUser;

class CommonController extends \yii\web\Controller
{
    public $layout = false; //不使用默认布局

    public $sessionGlobal; //全局session

    public $apiStatus; //ajax返回状态

    public function init()
    {
        parent::init();

        $this->sessionGlobal = \Yii::$app->session;

        $this->apiStatus = \Yii::$app->params['apiStatus']; // 配置config/params

    }

    public function beforeAction($action)
    {
        $adminSession = $this->sessionGlobal->get('admin');

        //cookie值
        $cookie = \Yii::$app->request->cookies->get('remember_token');

        //通过cookie中的token查询用户
        $adminUser = array();
        if(!empty($cookie)){
            $whereAdmin['remember_token'] = $cookie->value;
            $adminUser = AdminUser::findOne($whereAdmin);

            $this->sessionGlobal->set('admin',$adminUser);
        }

        if(empty($adminSession) && empty($adminUser)){
            //未登录
            return $this->redirect(array('index/login'))->send();
        }

        return parent::beforeAction($action);
    }

}
