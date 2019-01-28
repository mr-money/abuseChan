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
        if(!parent::beforeAction($action))
        {
            return false;
        }

        return parent::beforeAction($action);
    }

    /*
     * 管理后台首页
     * */
    public function actionIndex()
    {
        $admin = $this->sessionGlobal->get('admin');

        //默认头像
        $admin['avatar'] = empty($admin['avatar'])?\Yii::$app->request->getHostInfo().'/AmazeUi/img/user04.png':UPLOAD_DIR.'/avatar'.$admin['avatar'];

        $responseData['admin'] = $admin;

        //TODO 获取服务器信息




        return $this->render('index',$responseData);
    }

    /*
     * 退出登录ajax
     * */
    public function actionLogoutAjax(){
        $this->sessionGlobal->set('admin',null);

        $cookie = \Yii::$app->request->cookies;
        $cookie->remove('remember_token');

        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '已退出，请重新登录',
        );

        return json_encode($response);
    }

}
