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

    /*
     * 重写dump方法
     * */
    public function dump($data)
    {
        echo "<pre>";
            print_r($data);
        echo "<pre/>";
    }

    /**
     * @param int $seconds 格式 秒
     * @return string 例 16天1小时7分钟45秒
     */
    public function time2second($seconds){
        $seconds = (int)$seconds;
        if( $seconds<86400 ){//如果不到一天
            $format_time = gmstrftime('%H时%M分%S秒', $seconds);
        }else{
            $time = explode(' ', gmstrftime('%j %H %M %S', $seconds));//Array ( [0] => 04 [1] => 14 [2] => 14 [3] => 35 )
            $format_time = ($time[0]-1).'天'.$time[1].'时'.$time[2].'分'.$time[3].'秒';
        }
        return $format_time;
    }
}
