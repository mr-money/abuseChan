<?php

namespace app\module\Home\controllers;

use app\models\AdminUser;
use app\models\WxUser;
use yii\helpers\Url;
use yii\web\Controller;

class WechatController extends Controller
{
    public $layout = false; //不使用默认布局
    public $enableCsrfValidation = false; //不验证csrf

    private $wechatApp;

    public function init()
    {
        parent::init();
    }

    public function actionTest()
    {
        /*$openid = "oqpPK1WXbZ1rs5VkjLny3nC4GUs8";

        $wechat = \Yii::$app->wechat->app;
        $wxuser = $wechat->user->get($openid);

        print_r($wxuser);*/

        if(\Yii::$app->wechat->isWechat && !\Yii::$app->wechat->isAuthorized())
        {
            return \Yii::$app->wechat->authorizeRequired()->send();
        }

        $wxuser = \Yii::$app->wechat->user;
        print_r($wxuser);



        return $this->render('test');
    }


    /**
     * 创建微信server处理事件
     */
    public function actionServer()
    {
        $server = \Yii::$app->wechat->app->server;

        $server->push(function ($message) {
            \Yii::info($message,'wechat'); //记log

            //消息事件处理
            return $this->messageMange($message);
        });

        $response = $server->serve();
        return $response->send();
    }

    /**
     * 消息管理
     *
     * @param $message
     * @return string
     */
    private function messageMange($message)
    {
        switch ($message['MsgType']) {
            case 'event':

                if ($message['Event'] == 'subscribe') {
                    return $this->subscribeMange($message);

                } else if ($message['Event'] == 'unsubscribe') {
                    //取消关注时执行的操作，（注意下面返回的信息用户不会收到，因为你已经取消关注，但别的操作还是会执行的<如：取消关注的时候，要把记录该用户从记录微信用户信息的表中删掉>）

                    return $this->unsubscribeManage($message);

                } else if ($message['Event'] == 'CLICK') {
                    return $this->clickManage($message);
                }


                return '收到事件消息';
                break;
            case 'text':
                return "what?";
                break;
            case 'image':
                return '收到图片消息';
                break;
            case 'voice':
                return '收到语音消息';
                break;
            case 'video':
                return '收到视频消息';
                break;
            case 'location':
                return '收到坐标消息';
                break;
            case 'link':
                return '收到链接消息';
                break;
            case 'file':
                return '收到文件消息';
            // ... 其它消息
            default:
                return '收到其它消息';
                break;
        }


    }

    /**
     * 点击事件
     * @param $message
     * @return string
     */
    public function clickManage($message)
    {
        return $message['EventKey'];
        $openid = $message['FromUserName'];
        switch ($message['EventKey']) {
            case 'CLICK';
                return '点击事件';
        }

        return '点击事件';
    }

    /**
     * 关注逻辑处理
     *
     * @param $message
     * @return string
     */
    public function subscribeMange($message)
    {

        //下面是你点击关注时，进行的操作
        if(\Yii::$app->wechat->isWechat && !\Yii::$app->wechat->isAuthorized())
        {
            return \Yii::$app->wechat->authorizeRequired()->send();
        }

        $openid = $message['FromUserName'];

        $wechat = \Yii::$app->wechat->app;
        $wxuser = $wechat->user->get($openid);

        \Yii::info($wxuser,'wxuser');

        $wxUser = new WxUser();
        $wxUser->openid = $wxuser->openid;
        $wxUser->nickname = $wxuser->nickname;
        $wxUser->avatar = $wxuser->avatar;
        $wxUser->subscribe_time = date('Y-m-d H:i:s',time());
        $wxUser->create_at = date('Y-m-d H:i:s',time());
        $wxUser->update_at = date('Y-m-d H:i:s',time());
        WxUser::save();
        return '明月直入，无心可猜';
    }

    /**
     * 取消关注的操作
     *
     * @param $message
     * @param $wechat
     * @return string
     */
    public function unsubscribeManage($message, $wechat)
    {
        $where['openid'] = $message['FromUserName'];
        $data['subscribe_time'] = '';
        $res = WxUser::updateAll($data, $where);

        return '取消关注';
    }


    /**
     * 添加菜单
     */
    public  function  actionAddmenu(){
        $app = \Yii::$app->wechat->app;
        $buttons = [
                [
                    "type" => "view",
                    "name" => "俄罗斯方块",
                    "url"  => \Yii::$app->urlManager->createAbsoluteUrl('Home/game/tetris')
                ],
        ];

        var_dump($buttons);
        $res = $app->menu->create($buttons);
        var_dump($res);
    }

}
