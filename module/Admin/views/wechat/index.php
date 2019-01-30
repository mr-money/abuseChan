<?php  echo $this->render('../common/_layout') ?>


<?php $this->beginBody() ?>
<body data-type="index">
<!--<script src="assets/js/theme.js"></script>-->
<div class="am-g tpl-g">
    <!-- 头部 -->
    <?= $this->render('../common/_header') ?>

    <!-- 风格切换 -->
    <?= $this->render('../common/_skiner') ?>

    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <!--头像-->
                    <img src="<?= $admin['avatar']; ?>" alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              禁言小张
          </span>
                <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-heading">Components <span class="sidebar-nav-heading-info"> 附加组件</span></li>
            <li class="sidebar-nav-link">
                <a href="index.html" class="active">
                    <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="tables.html">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 表格
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="calendar.html">
                    <i class="am-icon-calendar sidebar-nav-link-logo"></i> 日历
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="form.html">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 表单

                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="chart.html">
                    <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 图表

                </a>
            </li>

            <li class="sidebar-nav-heading">Page<span class="sidebar-nav-heading-info"> 常用页面</span></li>
            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 数据列表
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="table-list.html">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 文字列表
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="table-list-img.html">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 图文列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-nav-link">
                <a href="sign-up.html">
                    <i class="am-icon-clone sidebar-nav-link-logo"></i> 注册
                    <span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="login.html">
                    <i class="am-icon-key sidebar-nav-link-logo"></i> 登录
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="404.html">
                    <i class="am-icon-tv sidebar-nav-link-logo"></i> 404错误
                </a>
            </li>

        </ul>
    </div>


    <!-- 内容区域 框架形式显示-->
    <div class="tpl-content-wrapper">
        <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="doc-tab-demo-1">
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="javascript: void(0)">首页</a></li>
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                    <iframe src="<?= \yii\helpers\Url::to(['wechat/home']); ?>" id="admin-index-content-iframe" frameborder="0"></iframe>
                </div>

            </div>
        </div>
        <br />
        <button type="button" class="am-btn am-btn-primary js-append-tab">插入 Tab</button>
    </div>

</div>
<!--<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/app.js"></script>-->

</body>
<?php $this->endBody() ?>

</html>

<script>
    //退出登录
    function logout() {
        myConfirm('确定退出吗',function () {
            $.post(
                "<?= \yii\helpers\Url::to(['wechat/logout-ajax']); ?>",
                {

                },
                function(data){
//                    console.log(data);
                    if(data.status == 1000){
                        location.reload();
                        return;
                    }
                },
                "json"
            );
        });

    }
</script>

<?php $this->endPage() ?>

