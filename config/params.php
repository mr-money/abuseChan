<?php

return [
    'adminEmail' => 'admin@example.com',

    //接口返回状态值
    'apiStatus' => array(
        'SUCCESS' => 1000,
        'ERROR' => 9999,
    ),

    //后台左侧导航栏
    'adminMenu' => array(
        'Components' => array(
            'navInfo' => '附加组件',
            'navLink' => array(
                array(
                    'name' => '首页',
                    'url' => "wechat/home",
                    'logo' => "am-icon-home sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '微信菜单编辑',
                    'url' => "wechat/menu",
                    'logo' => "am-icon-weixin sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '表格',
                    'url' => "",
                    'logo' => "am-icon-table sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '表单',
                    'url' => "",
                    'logo' => "am-icon-wpforms sidebar-nav-link-logo",
                    'navChild' => array(),
                ),

            ),
        ),

        'Page' => array(
            'navInfo' => '常用页面',
            'navLink' => array(
                array(
                    'name' => '数据列表',
                    'url' => null,  //存在子页面 不生成url 设置为null或false
                    'logo' => "am-icon-table sidebar-nav-link-logo",
                    'navChild' => array(
                        array(
                            'name' => '文字列表',
                            'url' => "",
                            'logo' => "am-icon-table sidebar-nav-link-logo",
                        ),
                        array(
                            'name' => '图文列表',
                            'url' => "",
                            'logo' => "am-icon-angle-right sidebar-nav-link-logo",
                        ),
                    ),
                ),
                array(
                    'name' => '注册',
                    'url' => "",
                    'logo' => "am-icon-clone sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '404错误',
                    'url' => "",
                    'logo' => "am-icon-tv sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
            ),
        ),
    ),


    // 微信配置 具体可参考EasyWechat
    'wechatConfig' => [
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id'  => 'wxa47b5b64afdb7376',         // AppID
        'secret'  => '5dc7779abc03796890d35e41dbfa6902',     // AppSecret
        'token'   => 'mamajiang',          // Token
        'aes_key' => 'Vkfz6VAU6YsGlku8LrodnGuUj8OGOqYdAsfy012sm9W', // EncodingAESKey，兼容与安全模式下请一定要填写！！！

        /**
         * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
         * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
         */
        'response_type' => 'array',
    ],

    // 微信支付配置 具体可参考EasyWechat
    'wechatPaymentConfig' => [],

    // 微信小程序配置 具体可参考EasyWechat
    'wechatMiniProgramConfig' => [],

    // 微信开放平台第三方平台配置 具体可参考EasyWechat
    'wechatOpenPlatformConfig' => [],

    // 微信企业微信配置 具体可参考EasyWechat
    'wechatWorkConfig' => [],

    // 微信企业微信开放平台 具体可参考EasyWechat
    'wechatOpenWorkConfig' => [],
];
