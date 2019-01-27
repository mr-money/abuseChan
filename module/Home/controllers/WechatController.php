<?php

namespace app\module\Home\controllers;

use yii\web\Controller;

class WechatController extends Controller
{
    public $layout = false; //不使用默认布局

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}
