<?php

//后台左侧导航栏
return array(
        'Components' => array(
            'navInfo' => '附加组件',
            'navLink' => array(
                array(
                    'name' => '骂骂酱',
                    'url' => "admin/home",
                    'logo' => "am-icon-home sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '网站主页',
                    'url' => "admin/edit-homepage",
                    'logo' => "am-icon-edit sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '微信菜单',
                    'url' => "admin/menu",
                    'logo' => "am-icon-weixin sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
                array(
                    'name' => '用户列表',
                    'url' => "wechat/user-list",
                    'logo' => "am-icon-user sidebar-nav-link-logo",
                    'navChild' => array(),
                ),
		array(
                    'name' => '编辑页面',
                    'url' => "wechat/editpage",
                    'logo' => "am-icon-edit sidebar-nav-link-logo",
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
    );