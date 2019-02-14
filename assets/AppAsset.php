<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 *
 * function addJs and addCss
 * @author 钱京 <740363495@qq.com>
 * @since 3.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',

        'AmazeUI/css/admin.css',
        'AmazeUI/css/amazeui.datatables.min.css',
        'AmazeUI/css/amazeui.min.css',
        'AmazeUI/css/app.css',
        'AmazeUI/css/fullcalendar.min.css',
        'AmazeUI/css/fullcalendar.print.css',

        'css/admin.index.css', //admin页面css
    ];
    public $js = [
        'AmazeUI/js/amazeui.datatables.min.js',
        'AmazeUI/js/amazeui.min.js',
        'AmazeUI/js/app.js',
        'AmazeUI/js/dataTables.responsive.min.js',
        'AmazeUI/js/echarts.min.js',
        'AmazeUI/js/moment.js',
        'AmazeUI/js/theme.js',
        'AmazeUI/js/fullcalendar.min.js',


//        'js/md5.js', //js md5加密
        'js/admin.index.js', //admin页面js
    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addJs($view, $jsfile) {
        $view->registerJsFile(
            $jsfile,
            [
                AppAsset::className(),
                "depends" => "app/assets/AppAsset"
            ]
        );
    }
    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile(
            $cssfile,
            [
                AppAsset::className(),
                "depends" => "app/assets/AppAsset"
            ]
        );
    }

}
