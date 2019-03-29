<?php

namespace app\module\Admin\controllers;

use app\models\AdminUser;
use yii\web\Controller;
use yii\web\Cookie;

class IndexController extends Controller
{
    public $layout = false; //不使用默认布局

    public $apiStatus; //ajax返回状态

    public $sessionGlobal; //session对象

    public function init()
    {
        $this->apiStatus = \Yii::$app->params['apiStatus']; // 配置config/params

        $this->sessionGlobal = \Yii::$app->session;

    }

    /*
     * 登录页面
     * */
    public function actionLogin()
    {
        return $this->render('login');
    }

    /*
     * 执行登录ajax
     * */
    public function actionDoLoginAjax()
    {
        //账号  用户名或密码
        $account = \Yii::$app->request->post('account');
        $password = \Yii::$app->request->post('password');

        $where = array(
            'and',
            [
                'or',
                "nickname = '$account'",
                "telphone = '$account'",
            ],
            "password = '$password'",
        );

        //查询用户
        $admin = AdminUser::find()->where($where)->asArray()->one();

        //没查到用户
        if (empty($admin)) {
            $response = array(
                'status' => $this->apiStatus['ERROR'],
                'message' => '账号或密码错误，请重试',
                'data' => $admin,
            );
            return json_encode($response);
        }

        //已选择记住我
        if (\Yii::$app->request->post('rememberMe') == 'true') {
            //生成remember_token放入cookie
            $remember_token = md5($account . $password . time());
            $cookieData = array(
                'name' => 'remember_token',
                'value' => $remember_token,
                'expire' => time() + (60 * 60 * 24 * 7), //过期时间
                'httpOnly' => true, //是否只读
            );

            $cookie = new Cookie($cookieData);
            \Yii::$app->response->cookies->add($cookie);

            //保存remember_token
            AdminUser::updateAll(['remember_token'=>$remember_token],['id'=>$admin['id']]);
        }

        //信息放入session
        $admin['expire_time'] = time() + (60 * 60 * 24 * 7); //过期时间
        $this->sessionGlobal->set('admin', $admin);

        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '成功',
            'data' => $admin,
        );

        return json_encode($response);
    }
}
