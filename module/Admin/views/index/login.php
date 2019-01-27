<?php

use app\assets\AppAsset;

AppAsset::register($this);
AppAsset::addJs($this, Yii::$app->request->baseUrl . "/js/md5.js");
//AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/b.css");

$this->beginPage();

$this->registerCsrfMetaTags();
?>
<!DOCTYPE html>
<html lang="en">

<?php $this->head() ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登录</title>
    <meta name="description" content="登录">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!--    <link rel="icon" type="image/png" href="assets/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="assets/css/amazeui.min.css" />
        <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
        <link rel="stylesheet" href="assets/css/app.css">
        <script src="assets/js/jquery.min.js"></script>-->

</head>

<?php $this->beginbody() ?>
<body data-type="login">
<!--    <script src="assets/js/theme.js"></script>-->
<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <div class="tpl-login">
        <div class="tpl-login-content" style="margin-top: 7%">
            <div class="tpl-login-logo">

            </div>

            <form class="am-form tpl-form-line-form" action="">
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" id="account" placeholder="请输入用户名或电话">
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" id="password" placeholder="请输入密码" autocomplete="off">
                </div>
                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">
                        记住密码
                    </label>

                </div>

                <div class="am-form-group">

                    <button type="button"
                            class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn"
                            id="submitLogin">提交
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
<!--    <script src="assets/js/amazeui.min.js"></script>-->
<!--    <script src="assets/js/app.js"></script>-->

</body>
<?php $this->endbody() ?>
</html>

<script>
    $(function () {

    })

    $("#submitLogin").click(function () {

        //判空
//        myAlert('用户名不能为空哦');

        var account = $("#account").val();
        var password = hex_md5($("#password").val());
        var rememberMe = $("#remember-me").is(':checked');

        $.post(
            "<?= \yii\helpers\Url::to(['index/do-login-ajax']); ?>",
            {
                account: account,
                password: password,
                rememberMe: rememberMe,
            },
            function (data) {
//                console.log(data);return;
                if(data.status == 1000){
                    myAlert('登录成功');
                    var url = "<?= \yii\helpers\Url::to(['wechat/index']); ?>";

                    location.href = url;
                    return;
                }else{
                    myAlert(data.message);
                    return;

                }
            },
            "json"
        );
    })
</script>

<?php $this->endpage() ?>
