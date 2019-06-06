<?php

namespace app\module\Admin\controllers;

use app\models\WxUser;
use yii\helpers\Json;

class WechatController extends CommonController
{

    public function init()
    {
        parent::init();

    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
    * 管理后台home页
    * */
    public function actionUserList()
    {
        $responseData = array(); //返回数据

        $where = array('and',); //搜索条件
        $nickname = \Yii::$app->request->get('nickname');
        $tel = \Yii::$app->request->get('tel');

        !empty($nickname)?array_push($where,['like','nickname',$nickname]):''; //模糊查询 昵称
        !empty($tel)?array_push($where,['like','tel',$tel]):''; //模糊查询 电话


        $wxUser = WxUser::find()->where($where)->asArray()->all();

        $responseData['wxUser'] = $wxUser;

        return $this->render('userList', $responseData);
    }

    /**
     * @param id int 用户id
     * @return json
     */
    public function actionDelUserAjax()
    {
        $where['id'] = \Yii::$app->request->post('id');

        $res = WxUser::deleteAll($where);

        if($res){
            $response = $this->ajaxReturn('SUCCESS','删除成功');
        }else{
            $response = $this->ajaxReturn('ERROR','删除失败');
        }

        return $response;
    }
}
