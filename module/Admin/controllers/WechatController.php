<?php

namespace app\module\Admin\controllers;

use app\models\WxUser;
use yii\data\Pagination;

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

        !empty($nickname) ? array_push($where, ['like', 'nickname', $nickname]) : ''; //模糊查询 昵称
        !empty($tel) ? array_push($where, ['like', 'tel', $tel]) : ''; //模糊查询 电话


//        $wxUser = WxUser::find()->where($where)->asArray()->all();

        $_user = WxUser::find()->where($where);

        //分页
        $count = $_user->count();
        $pageConfig = [
            'totalCount' => $count,
            'pageSize' => 10, //每页数量
            'pageSizeParam' => false, //总页数隐藏
        ];
        $page = new Pagination($pageConfig);

        $wxUser = $_user->offset($page->offset)->limit($page->limit)->all();
        $responseData['wxUser'] = $wxUser;
        $responseData['page'] = $page;

        return $this->render('userList', $responseData);
    }

    /**
     * 删除微信用户ajax
     * @param id int 用户id
     * @return string json
     */
    public function actionDelUserAjax()
    {
        $where['id'] = \Yii::$app->request->post('id');

        $res = WxUser::deleteAll($where);

        if ($res) {
            $response = $this->ajaxReturn('SUCCESS', '删除成功');
        } else {
            $response = $this->ajaxReturn('ERROR', '删除失败');
        }

        return $response;
    }
}
