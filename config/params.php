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
                    'name'=>'首页',
                    'url' => "home",
                    'logo' => "am-icon-home sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name'=>'表格',
                    'url' => "",
                    'logo' => "am-icon-table sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name'=>'表单',
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
                    'name'=>'数据列表',
                    'url' => null,  //存在子页面 不生成url 设置为null或false
                    'logo' => "am-icon-table sidebar-nav-link-logo",
                    'navChild' => array(
                        array(
                            'name'=>'文字列表',
                            'url' => "",
                            'logo' => "am-icon-table sidebar-nav-link-logo",
                        ),
                        array(
                            'name'=>'图文列表',
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
];
