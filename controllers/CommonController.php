<?php

namespace app\controllers;

use yii\web\Controller;

class CommonController extends Controller
{
    /**
     * 重写dump方法
     * @param $data
     */
    public static function dump($data = [])
    {
        echo "<pre>";
            var_dump($data);
        echo "<pre/>";
    }
}