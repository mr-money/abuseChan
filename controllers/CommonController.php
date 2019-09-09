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


    public static function http_post_json($url, $data)
    {
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = FALSE; //是否返回响应头信息
        $params[CURLOPT_SSL_VERIFYPEER] = false;
        $params[CURLOPT_SSL_VERIFYHOST] = false;
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS] = $data;
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接

        return $content;
    }
}