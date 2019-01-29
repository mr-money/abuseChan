<?php

namespace app\module\Admin\controllers;

class WechatController extends CommonController
{
    public function init()
    {
        parent::init();

    }

    /*
     * 检查登录
     * */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        return parent::beforeAction($action);
    }

    /*
     * 管理后台首页外部框架
     * */
    public function actionIndex()
    {
        //系统类型
        if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
            'windows';
        } else {
            'linux';
        }
        $admin = $this->sessionGlobal->get('admin');

        //默认头像
        $admin['avatar'] = empty($admin['avatar']) ? \Yii::$app->homeUrl . 'AmazeUi/img/user04.png' : UPLOAD_DIR . '/avatar' . $admin['avatar'];

        $responseData['admin'] = $admin;

        //TODO 获取服务器信息


        return $this->render('index', $responseData);
    }

    /*
     * 退出登录ajax
     * */
    public function actionLogoutAjax()
    {
        $this->sessionGlobal->set('admin', null);

        $cookie = \Yii::$app->request->cookies;
        $cookie->remove('remember_token');

        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '已退出，请重新登录',
        );

        return json_encode($response);
    }

    /*
    * 管理后台home页
    * */
    public function actionHome()
    {
        return $this->render('home');
    }

}
