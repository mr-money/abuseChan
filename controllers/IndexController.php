<?php

namespace app\controllers;

use yii\web\Controller;

class IndexController extends Controller
{
    //网站首页
    public function actionIndex()
    {
        return $this->render('index');
    }
}