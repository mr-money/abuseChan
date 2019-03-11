<?php

namespace app\module\Home\controllers;

use yii\web\Controller;

class WechatController extends Controller
{
    public $layout = false; //不使用默认布局
    public $enableCsrfValidation = false; //不验证csrf

    public function init()
    {
        parent::init();
    }

    public function actionTest()
    {
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
            $wechat = \Yii::$app->wechat->app;
            return $this->messageMange($message, $wechat);
        });

        $response = $server->serve();
        $response->send();
    }

    /**
     * 消息管理
     *
     * @param $message
     * @param $wechat
     * @return string
     */
    private function messageMange($message, $wechat)
    {
        switch ($message['MsgType']) {
            case 'event':

                if ($message['Event'] == 'subscribe') {
                    return $this->subscribeMange($message, $wechat);

                } else if ($message['Event'] == 'unsubscribe') {
                    //取消关注时执行的操作，（注意下面返回的信息用户不会收到，因为你已经取消关注，但别的操作还是会执行的<如：取消关注的时候，要把记录该用户从记录微信用户信息的表中删掉>）

                    return $this->unsubscribeManage($message, $wechat);

                } else if ($message['Event'] == 'CLICK') {
                    return $this->clickManage($message, $wechat);
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
     * @param $wechat
     * @return string
     */
    public function clickManage($message, $wechat)
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
     * @param $wechat
     * @return string
     */
    public function subscribeMange($message, $wechat)
    {
        //下面是你点击关注时，进行的操作
        //TODO 保存用户信息
        /*        $wxuser = new Wxuser;
                $user_info['openid'] = $message['FromUserName'];

                $result = $wxuser->where(array('openid'=>$user_info['openid']))->first();
                if(is_null($result)){
                    $userService = $wechat->user;
                    $user = $userService->get($user_info['openid']);
        //            Log::info($user);
                    $wxuser->openid =  $user_info['openid'];
                    $wxuser->nickname =  $user['nickname'];
                    $wxuser->avatar =  $user['headimgurl'];
                    $wxuser->sex =  $user['sex'];
                    $wxuser->is_subscribe =  1;
                    $wxuser->subscribe_time =  $user['subscribe_time'];

                    $wxuser->save();
                    //数据发送到erp
                    $this->sendErp($wxuser->toArray(),$user_info['openid']);

                }else{
                    $result->is_subscribe =  1;
                    $result->save();
                }*/

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
        /*        $wxuser = new Wxuser;
                $result = $wxuser->where(array('openid' => $message['FromUserName']))->first();
                $result->is_subscribe = 0;
                $result->save();*/

        return '取消关注';
    }

}
